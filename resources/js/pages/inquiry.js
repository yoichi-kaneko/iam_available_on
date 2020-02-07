$(function () {
    //Textarea auto growth
    autosize($('textarea.auto-growth'));

    $('#inquiry_form').validate({
        rules: {
            'name': {
                required: true,
                maxlength: 64
            },
            'mail': {
                required: true,
                email: true,
                maxlength: 64
            },
            'text': {
                required: true,
                maxlength: 400
            }
        },
        messages: {
            'name': {
                required: '名前を入力してください。',
                maxlength: '名前は64字までです。'
            },
            'mail': {
                required: 'メールアドレスを入力してください。',
                email: 'メールアドレスの形式が正しくありません。',
                maxlength: 'メールアドレスは64字までです。'
            },
            'text': {
                required: '問い合わせ本文を入力してください。',
                maxlength: '問い合わせ本文は64字までです。'
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
