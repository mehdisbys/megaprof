@extends('layouts.master')

@section('content')
    <div class="col-md-12 faq">

        <div class=" col-md-8 col-md-offset-2" style="margin-top: 80px">
        <h3 style="text-align: center">FAQ Élèves</h3>

            <div class="question-reponse panel-group col-md-12 topmargin-small">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapse1" class="question">Comment trouver un
                                professeur
                                sur le
                                site ?</a>
                        </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse reponse">
                        <div class="panel-body reponse">
                            Pour trouver un professeur, entrez simplement l’activité pour laquelle vous avez besoin
                            d’un
                            professeur,
                            la
                            ville souhaitée (ex: Anglais, Casablanca). Vous verrez ensuite une liste de tous les
                            professeurs
                            correspondant à
                            vos critères. Cliquez sur le nom du professeur pour en savoir plus et le contacter
                            directement.
                        </div>
                    </div>
                </div>
            </div>


            <div class="question-reponse panel-group col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapse2" class="question">Comment se mettre en
                                relation
                                avec le professeur ?</a>
                        </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse reponse">
                        <div class="panel-body reponse">
                            Vous pouvez contacter des offres de professeurs en devenant membres en vous inscrivant
                            sur
                            notre
                            plateforme
                            et c’est gratuit ! Une fois que le professeur a reçu et accepté votre demande, nous vous
                            donnons
                            accès
                            aux
                            détails de ses coordonnées. Nous envoyons également vos coordonnées aux
                            professeurs.
                        </div>
                    </div>
                </div>
            </div>

            <div class="question-reponse panel-group col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapse3" class="question">Comment TAELAM assure-t-il
                                la
                                qualité des professeurs  ?</a>
                        </h4>
                    </div>
                    <div id="collapse3" class="panel-collapse collapse reponse">
                        <div class="panel-body reponse">
                            Le site est une communauté où les professeurs et les élèves sont connectés les uns les
                            autres
                            afin de
                            donner
                            et recevoir des cours. Chaque élève est à la recherche de quelque chose de différent chez un
                            professeur
                            et
                            notre
                            vocation est de vous donner les meilleures options et les outils utiles et nécessaires pour
                            trouver
                            votre
                            professeur idéal.
                        </div>
                    </div>
                </div>
            </div>

            <div class="question-reponse panel-group col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapse4" class="question">Comment organiser une leçon
                                 ?</a>
                        </h4>
                    </div>
                    <div id="collapse4" class="panel-collapse collapse reponse">
                        <div class="panel-body reponse">Vous pouvez convenir d’un arrangement en échangeant avec le
                            professeur via une demande de cours.
                        </div>
                    </div>
                </div>
            </div>

            <div class="question-reponse panel-group col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapse5" class="question">À quel moment dois-je payer
                                 ?</a>
                        </h4>
                    </div>
                    <div id="collapse5" class="panel-collapse collapse reponse">
                        <div class="panel-body reponse">
                            Il est gratuit de chercher, sélectionner et contacter les professeurs de toutes
                            disciplines.

                        </div>
                    </div>
                </div>
            </div>

            <div class="question-reponse panel-group col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapse6" class="question">Un professeur n’a pas
                                répondu à
                                ma demande, que faire ?</a>
                        </h4>
                    </div>
                    <div id="collapse6" class="panel-collapse collapse reponse">
                        <div class="panel-body reponse">
                            Il se peut qu’un professeur soit temporairement indisponible. Nous contactons les
                            professeurs
                            dès que
                            vous
                            faites une demande de cours. Nous vous recommandons de contacter plus d’un professeur pour
                            avoir
                            le plus
                            de
                            réponses possible. Si vous avez des questions auxquelles nous n’avons pas répondu ou des
                            informations
                            complémentaires que vous souhaitez avoir,  <a class="mouse-hand" data-toggle="modal" data-target="#contact"
                                                                                                            data-original-title>merci de nous poser votre question</a>.
                        </div>
                    </div>
                </div>
            </div>

            <div class="question-reponse panel-group col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapse7" class="question">Combien coûte une heure de
                                cours ?</a>
                        </h4>
                    </div>
                    <div id="collapse7" class="panel-collapse collapse reponse">
                        <div class="panel-body reponse">
                            Chaque professeur est différent, l’heure peut ainsi varier selon le professeur, le
                            niveau, le
                            contenu, la
                            structure. Sur le profil de chaque professeur, vous pouvez voir le prix de l’heure qu’il
                            propose. Sur le
                            profil,
                            vous avez aussi une liste importante d’informations comme son expérience, ses
                            qualifications,
                            ses atouts
                            etc.
                        </div>
                    </div>
                </div>
            </div>

            <div class="question-reponse panel-group col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapse8" class="question">Où se dérouleront les
                                cours ?</a>
                        </h4>
                    </div>
                    <div id="collapse8" class="panel-collapse collapse reponse bottommargin-small">
                        <div class="panel-body reponse">
                            Les cours auront lieu où vous le souhaitez, le choix vous revient à vous et au
                            professeur. Si
                            vous
                            décidez
                            que le cours se passe à la maison, vous pouvez simplement le dire au professeur via la boîte
                            de
                            messagerie.
                            Beaucoup de professeurs acceptent que les cours se déroulent dans un lieu public comme une
                            librairie, un
                            café ou
                            une bibliothèque. Plusieurs professeurs également se sont spécialisés dans les cours par
                            internet. C’est
                            comme
                            vous voulez !
                        </div>
                    </div>
                </div>
            </div>

            <h3 class="topmargin-small" style="text-align: center">FAQ Professeurs</h3>

            <div class="question-reponse panel-group col-md-12 topmargin-small">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapse9" class="question">Combien coûte l’inscription
                                sur
                                le site TAELAM En tant que professeur  ?</a>
                        </h4>
                    </div>
                    <div id="collapse9" class="panel-collapse collapse reponse">
                        <div class="panel-body reponse"> L’inscription et les services fournis par TAELAM sont
                            gratuits
                            pour les professeurs.
                        </div>
                    </div>
                </div>
            </div>

            <div class="question-reponse panel-group col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapse10" class="question">Comment serais-je averti
                                des
                                demandes des élèves  ?</a>
                        </h4>
                    </div>
                    <div id="collapse10" class="panel-collapse collapse reponse">
                        <div class="panel-body reponse">
                            Nous vous enverrons un mail comprenant les demandes de cours des élèves en vous invitant
                            à
                            vous
                            connecter
                            à
                            votre espace afin de répondre à celles-ci dès que possible pour vous. Si un professeur
                            reçoit
                            des
                            demandes
                            qu’il
                            laisse sans réponse, ses annonces ne seront plus visibles sur le site, ceci dans un souci de
                            toujours
                            avoir
                            des
                            annonces à jour et actualisées.
                        </div>
                    </div>
                </div>
            </div>

            <div class="question-reponse panel-group col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapse11" class="question">De quelles qualifications
                                ai-je
                                besoin pour être professeur  ?</a>
                        </h4>
                    </div>
                    <div id="collapse11" class="panel-collapse collapse reponse">
                        <div class="panel-body reponse">
                            Notre site propose une très large gamme de disciplines, le niveau de qualification demandé
                            dépendra
                            donc
                            de
                            ces activités et des attentes des élèves, nous laissons le choix à l’élève de trouver son
                            professeur en
                            fonction
                            de ses critères, nous ne limitons pas le professeur à des qualifications mais à ce qu’il
                            peut
                            apporter à
                            l’élève,
                        </div>
                    </div>
                </div>
            </div>

            <div class="question-reponse panel-group col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapse12" class="question">Est-ce que vous employez
                                des
                                professeurs ?</a>
                        </h4>
                    </div>
                    <div id="collapse12" class="panel-collapse collapse reponse">
                        <div class="panel-body reponse"> Non, tous les professeurs travaillent à leur compte, sans
                            intermédiaires.
                        </div>
                    </div>
                </div>
            </div>
            <div class="question-reponse panel-group col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapse13" class="question">Je suis un travailleur
                                étranger,
                                puis-je être un professeur ?</a>
                        </h4>
                    </div>
                    <div id="collapse13" class="panel-collapse collapse reponse">
                        <div class="panel-body reponse">
                            Si votre titre de séjour vous permet de travailler au Maroc, vous pouvez biensûr
                            devenir
                            professeur.
                        </div>
                    </div>
                </div>
            </div>
            <div class="question-reponse panel-group col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapse14" class="question">Quand puis-je commencer à
                                donner
                                un cours ?</a>
                        </h4>
                    </div>
                    <div id="collapse14" class="panel-collapse collapse reponse">
                        <div class="panel-body reponse">
                            Dès que vous avez accepté la demande d’un élève, celui-ci peut voir vos coordonnées et
                            vous
                            contacter.
                        </div>
                    </div>
                </div>
            </div>

            <div class="question-reponse panel-group col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapse15" class="question">Comment changer mon
                                profil ?</a>
                        </h4>
                    </div>
                    <div id="collapse15" class="panel-collapse collapse reponse">
                        <div class="panel-body reponse">
                            Dans votre espace dédié lors de votre inscription, vous pouvez changer les informations
                            ou
                            les
                            conditions
                            de
                            votre profil à tout moment.
                        </div>
                    </div>
                </div>
            </div>

            <div class="question-reponse panel-group col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapse16" class="question">Comment fonctionne le
                                système de
                                commentaires  ?</a>
                        </h4>
                    </div>
                    <div id="collapse16" class="panel-collapse collapse reponse">
                        <div class="panel-body reponse">
                            Après le premier cours ou quelques cours, nous invitons vos élèves à faire part de leur
                            expérience en
                            laissant un commentaire . Notre vocation à travers cette plateforme est d’avoir une
                            communauté
                            partageant un
                            savoir, une connaissance ou une compétence de qualité, pour cela plus il y a de commentaires
                            renseignés
                            plus
                            votre profil sera attractif.
                        </div>
                    </div>
                </div>
            </div>


            <div class="question-reponse panel-group col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapse17" class="question">Quel tarif demander  ?</a>
                        </h4>
                    </div>
                    <div id="collapse17" class="panel-collapse collapse reponse">
                        <div class="panel-body reponse">
                            Le tarif dépend de plusieurs critères comme : le type d’activité, du niveau de
                            l’enseignement, et de votre région. Et enfin, vous devez voir quels prix proposent les autres professeurs proches de
                            chez vous pour la même activité ou des activités similaires.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection