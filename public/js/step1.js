$(function () {
    $('#subject_form').on('submit', function (e) {

        var inputErrorMessage =  $("#input_error_message");
        var inputErrorMoreThanSix = $("#input_error_no_more_than_six");

        inputErrorMessage.addClass('hidden');
        inputErrorMoreThanSix.addClass('hidden');

        var subjects = $(this).find("[type=checkbox]");

        var nbSubjectsSelected = 0;

        for (i = 0; i < subjects.length; i++) {

            if ($(subjects[i]).is(':checked') === true) {
                nbSubjectsSelected++;
            }
        }

        if(nbSubjectsSelected == 0)
        {
            e.preventDefault();
            inputErrorMessage.removeClass('hidden');
        }

        if(nbSubjectsSelected > 5){
            e.preventDefault();
            inputErrorMoreThanSix.removeClass('hidden');
        }
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
//# sourceMappingURL=step1.js.map
