{!! HTML::style("css/pikaday.css") !!}
{!! HTML::script("js/moment.min.js") !!}
{!! HTML::script("js/pikaday.js") !!}

<script>
    $('.pikaday-field').each(function () {
                new Pikaday({
                    field: $(this)[0],
                    format: 'DD/MM/YYYY',
                    i18n: {
                        previousMonth: 'Mois Précèdent',
                        nextMonth: 'Mois Suivant',
                        months: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Decembre'],
                        weekdays: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
                        weekdaysShort: ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam']
                    },
                });
            }
    );


</script>