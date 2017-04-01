$(function () {

    var countWords = function (string) {
        return string
                .replace(/(^\s*)|(\s*$)/gi, "")
                .replace(/\s+/gi, " ")
                .split(' ').length - 1;
    };

    var updateCount = function (el, expected) {
        var nb = expected - countWords($(el).val());
        if (nb > 0) {
            $("#" + $(el).attr('id') + "-text").removeClass('no-display');
            $("#" + $(el).attr('id') + "-count").text(nb);

        }
        if (nb <= 0) {
            $("#" + $(el).attr('id') + "-count").text('');
            $("#" + $(el).attr('id') + "-text").addClass('no-display');
        }
        return nb;
    };

    var count10 = function (el) {
        return updateCount(el, 10);
    };

    $(".sm-form-control").on("keypress change", (function () {
        count10(this);
    }));

    window.Parsley
        .addValidator('minimumwords', {
            requirementType: 'string',
            validateString: function (value, requirement) {
                return countWords(value) > requirement;
            },
            messages: {
                en: 'Veuillez entrer au minimum %s mots dans cette section'
            }
        });


    $('#title_form').parsley()
        .on('field:validated', function () {

            var ok = $('.parsley-error').length === 0;

            $('.bs-callout-warning').toggleClass('hidden', ok);
        })
        .on('form:submit', function () {
            return true;
        });
});
//# sourceMappingURL=step2.js.map
