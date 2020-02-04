"use strict";

let escape = require('escape-html');
require('../const/schedule_status');

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
        titleFormat: 'YYYY年M月',
        defaultDate: returned_data.date_range.start,
        validRange: {
            start: returned_data.date_range.start,
            end: returned_data.date_range.end
        },
        editable: false,
        droppable: false, // this allows things to be dropped onto the calendar
        eventLimit: true, // allow "more" link when too many events
        events: events_data,
        height: 700,
        dayRender: function (date, cell) {
            let formatted_date = $.fullCalendar.formatDate(date,'YYYY-MM-DD');
            if(returned_data.holidays.indexOf(formatted_date) >= 0) {
                cell.addClass('fc-holiday');
            }
        },
        eventClick: function(info) {
            showModal(info);
        },
        eventAfterAllRender: function (info) {
            $('#calendar_list').css('max-height', $('#calendar_card').height());
            fadeOutLoader();
        }
    });
    $.each(events_data, function (id, val) {
        renderCalendarList(val);
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
                let event = getEventInfo(returned_data.id);

                event.status = returned_data.status;
                event.comment = returned_data.comment;
                event.title = makeText(returned_data.status, returned_data.comment);
                let colorClass = SCHEDULE_STATUS[returned_data.status].className;
                event.className = ['b-l', 'b-2x', colorClass];
                $('#calendar').fullCalendar('updateEvent', event);
                renderCalendarList(event);
                showInfo('スケジュールが更新されました');
            },
            error: function (returned_data) {
                showError('更新に失敗しました');
            },
            complete: function (returned_data) {
                $('#modal_button').click();
            }
        });

    });
}

function showModal(info)
{
    // #schedule_idがあればオーナーのModalと見なす
    if ($('#schedule_id').length > 0) {
        $('#schedule_id').val(info.id);
        $('#schedule_date').html(info.date);
        $('#schedule_comment').val(info.comment);
        $('#schedule_status_' + info.status).prop('checked', true);
        $('#schedule_loader').hide();
        // そうでない場合、別のユーザのModalと見なす
    } else {
        $('#schedule_date').html(info.date);
        $('#comment_body').removeClass();
        $('#comment_body').addClass('event-name event_list ' + SCHEDULE_STATUS[info.status].className);
        $('#schedule_comment').html(makeText(info.status, info.comment));
    }

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

function getEventInfo(schedule_id) {
    let event = $('#calendar').fullCalendar('clientEvents', function(evt) {
        return evt.id == schedule_id;
    });
    return event[0];
}

function renderCalendarList(event_data)
{
    let event_class =  SCHEDULE_STATUS[event_data.status].className;
    let date = dateFormat(event_data.start, 'mm-dd');
    let tmpl = $('#event_list').render({id: event_data.id, event_class: event_class, date: date, text: escape(event_data.title)});
    if ($('#schedule_' + event_data.id).length) {
        $('#schedule_' + event_data.id).replaceWith(tmpl);
    } else {
        $('#calendar_list').append(tmpl);
    }
    $('#schedule_' + event_data.id).click(function(){
        let event = getEventInfo(event_data.id);
        showModal(event);
    });
}
