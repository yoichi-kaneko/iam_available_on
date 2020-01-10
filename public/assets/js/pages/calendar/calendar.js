"use strict";

$.ajax({
    type: 'GET',
    url: '/api/calendar/' + USER_CODE,
    format: 'json',
    success: function (returned_data) {
        renderCalendar(returned_data);
        bindCalendarEvents();
    },
});

function renderCalendar(returned_data)
{
    let events_data = parseCalendarEvents(returned_data.schedules);
    $('#calendar').fullCalendar({
        header: {
            left: 'prev',
            center: 'title',
            right: 'next'
        },
        locale: 'ja',
        defaultDate: returned_data.date_range.start,
        validRange: {
            start: returned_data.date_range.start,
            end: returned_data.date_range.end
        },
        editable: false,
        droppable: false, // this allows things to be dropped onto the calendar
        eventLimit: true, // allow "more" link when too many events
        events: events_data,
        dayRender: function (date, cell) {
            let formatted_date = $.fullCalendar.formatDate(date,'YYYY-MM-DD');
            if(returned_data.holidays.indexOf(formatted_date) >= 0) {
                cell.addClass('fc-holiday');
            }
        },
        eventClick: function(info) {
            showModal(info);
        }
    });
    // TODO: この処理をちゃんと整理する
    $.each(events_data, function (id, val) {
        let event_class =  SCHEDULE_STATUS[val.status].className;
        let date = dateFormat(val.start, 'mm-dd');
        let tmpl = $('#event_list').render({id: val.id, event_class: event_class, date: date, text: val.title});
        $('#calendar_list').append(tmpl);
        $('.event_list').click(function(){
            let schedule_id = $(this).attr('id').replace('schedule_', '');
            let event = $('#calendar').fullCalendar('clientEvents', function(evt) {
                return evt.id == schedule_id;
            });

            showModal(event[0]);
        });
    });
}

function parseCalendarEvents(schedules)
{
    let event_data = [];
    $.each(schedules,function(index, val){
        let colorClass = SCHEDULE_STATUS[val.status].className;
        let mark = SCHEDULE_STATUS[val.status].mark;
        event_data.push(
            {
                id: val.id,
                comment: val.comment,
                status: val.status,
                title: makeText(val.status, val.comment),
                start: val.date,
                date: val.date,
                className: ['b-l', 'b-2x', colorClass],
            }
        )
    });

    return event_data;
}

function bindCalendarEvents()
{
    // Previous month action
    $('#cal-prev').click(function(){
        $('#calendar').fullCalendar( 'prev' );
    });

    // Next month action
    $('#cal-next').click(function(){
        $('#calendar').fullCalendar( 'next' );
    });

    // Change to month view
    $('#change-view-month').click(function(){
        $('#calendar').fullCalendar('changeView', 'month');

        // safari fix
        $('#content .main').fadeOut(0, function() {
            setTimeout( function() {
                $('#content .main').css({'display':'table'});
            }, 0);
        });
    });

    $('#save_schedule').click(function(){
        $('#schedule_loader').show();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '/api/calendar/schedule',
            format: 'json',
            data: {
              id: $('#schedule_id').val(),
              status: $("input[name='schedule_status']:checked").val(),
              comment:  $('#schedule_comment').val()
            },
            success: function (returned_data) {
                showInfo('スケジュールが更新されました');
                // TODO: この書き方でイベント更新できるので、これをちゃんと整備する
                let event = $('#calendar').fullCalendar('clientEvents', function(evt) {
                   return evt.id == returned_data.id;
                });
                event[0].status = returned_data.status;
                event[0].comment = returned_data.comment;
                event[0].title = makeText(returned_data.status, returned_data.comment);
                let colorClass = SCHEDULE_STATUS[returned_data.status].className;
                event[0].className = ['b-l', 'b-2x', colorClass];
                $('#calendar').fullCalendar('updateEvent', event[0]);
            },
            error: function (returned_data) {
                showError('更新に失敗しました');
            },
            complete: function (returned_data) {
                $('#modal_button').click();
            }
        });

    });

    // Change to week view
    $('#change-view-week').click(function(){
        $('#calendar').fullCalendar( 'changeView', 'agendaWeek');

        // safari fix
        $('#content .main').fadeOut(0, function() {
            setTimeout( function() {
                $('#content .main').css({'display':'table'});
            }, 0);
        });

    });

    // Change to day view
    $('#change-view-day').click(function(){
        $('#calendar').fullCalendar( 'changeView','agendaDay');

        // safari fix
        $('#content .main').fadeOut(0, function() {
            setTimeout( function() {
                $('#content .main').css({'display':'table'});
            }, 0);
        });

    });

    // Change to today view
    $('#change-view-today').click(function(){
        $('#calendar').fullCalendar('today');
    });
}

function showModal(info)
{
    $('#schedule_id').val(info.id);
    $('#schedule_date').html(info.date);
    $('#schedule_comment').val(info.comment);
    $('#schedule_status_' + info.status).prop('checked', true);
    $('#schedule_loader').hide();
    $('#modal_button').click();
}

function makeText(status, comment)
{
    let mark = SCHEDULE_STATUS[status].mark;
    let ret = mark;
    if (comment != null && comment != '') {
        ret += ' ' + comment;
    }

    return ret;
}

    /* initialize the external events
     -----------------------------------------------------------------*/
    $('#external-events .event-control').each(function() {

        // store data so the calendar knows to render an event upon drop
        $(this).data('event', {
            title: $.trim($(this).text()), // use the element's text as the event title
            stick: true // maintain when user navigates (see docs on the renderEvent method)
        });

        // make the event draggable using jQuery UI
        $(this).draggable({
            zIndex: 999,
            revert: true,      // will cause the event to go back to its
            revertDuration: 0  //  original position after the drag
        });

    });

    $('#external-events .event-control .event-remove').on('click', function(){
        $(this).parent().remove();
    });

    // Submitting new event form
    $('#add-event').submit(function(e){
        e.preventDefault();
        var form = $(this);

        var newEvent = $('<div class="event-control p-10 mb-10">'+$('#event-title').val() +'<a class="pull-right text-muted event-remove"><i class="fa fa-trash-o"></i></a></div>');

        $('#external-events .event-control:last').after(newEvent);

        $('#external-events .event-control').each(function() {

            // store data so the calendar knows to render an event upon drop
            $(this).data('event', {
                title: $.trim($(this).text()), // use the element's text as the event title
                stick: true // maintain when user navigates (see docs on the renderEvent method)
            });

            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 999,
                revert: true,      // will cause the event to go back to its
                revertDuration: 0  //  original position after the drag
            });

        });

        $('#external-events .event-control .event-remove').on('click', function(){
            $(this).parent().remove();
        });

        form[0].reset();

        $('#cal-new-event').modal('hide');

    });
