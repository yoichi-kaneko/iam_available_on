$(function () {
    //Textarea auto growth
    autosize($('textarea.auto-growth'));

    $('#user_form').validate({
        rules: {
            'display_name': {
                required: true,
                maxlength: 16
            },
            'description': {
                maxlength: 128
            }
        },
        messages: {
            'display_name': {
                required: '表示名を入力してください。',
                maxlength: '表示名は16字までです。'
            },
            'description': {
                maxlength: '表示テキストは128字までです。'
            }

        },
        highlight: function (input) {
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.form-group').append(error);
        }
    });
});
