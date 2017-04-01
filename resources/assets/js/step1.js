$(function () {
    $('#subject_form').on('submit', function (e) {
        var subjects = $(this).find("[type=checkbox]");

        for (i = 0; i < subjects.length; i++) {
            if ($(subjects[i]).is(':checked') === true) {
                return;
            }
        }

        e.preventDefault();
        $("#input_error_message").removeClass('hidden');
    });

    // new Awesomplete(document.getElementById('subject_input'), {
    //     filter: function (text, input) {
    //         return new RegExp("^" + removeDiacritics(input.match(/[^,]*$/)[0].trim()), "i").test(removeDiacritics(text));
    //     },
    //     replace: function (text) {
    //         var before = this.input.value.match(/^.+,\s*|/)[0];
    //         this.input.value = before + text + ", ";
    //     }
    // });
});