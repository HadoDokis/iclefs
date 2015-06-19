angular.module('templates-app', ['form/form.tpl.html', 'valid/valid.tpl.html']);

angular.module("form/form.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("form/form.tpl.html",
    "<div class=\"col-md-12\" ng-if=\"!formSent\">\n" +
    "    <div class=\"formulaire col-md-6\">\n" +
    "        <form class=\"form-horizontal\" ng-submit=\"postData()\">\n" +
    "            <fieldset class=\"col-md-6\">\n" +
    "\n" +
    "                <!-- Form Name -->\n" +
    "                <legend>Formulaire</legend>\n" +
    "\n" +
    "                <div class=\"form-group\">\n" +
    "                    <label for=\"name\">Nom du formulaire</label>\n" +
    "                    <input type=\"text\" class=\"form-control\" id=\"name\" placeholder=\"Nom\" ng-model=\"formulaire.name\" required>\n" +
    "                </div>\n" +
    "                <div class=\"form-group\">\n" +
    "                    <label for=\"desc\">Description</label>\n" +
    "                    <input type=\"text\" class=\"form-control\" id=\"desc\" placeholder=\"Description\" ng-model=\"formulaire.description\" required>\n" +
    "                </div>\n" +
    "                <div class=\"form-group\">\n" +
    "                    <label for=\"mail\">Courriel</label>\n" +
    "                    <input type=\"email\" class=\"form-control\" id=\"mail\" placeholder=\"Courriel\" ng-model=\"formulaire.email\" required>\n" +
    "                </div>\n" +
    "            </fieldset>\n" +
    "\n" +
    "            <fieldset class=\"col-md-6\">\n" +
    "                <legend>Données sélectionnées</legend>\n" +
    "                <div>\n" +
    "                    <span ng-if=\"isEmpty(selectedData)\" class=\"text-info\">Aucune donnée n'est actuellement sélectionnée.</span>\n" +
    "                    <ul>\n" +
    "                        <li ng-repeat=\"dataFd in dataAvailable\" ng-if=\"hasKey(selectedData, dataFd.fd_id)\">\n" +
    "                            {{dataFd.fd_name}}\n" +
    "                            <ul class=\"list-selected\">\n" +
    "                                <li ng-repeat=\"(key, value) in dataFd.fd_provided_info\" ng-if=\"selectedData[dataFd.fd_id].indexOf(key) != -1\" ng-click=\"removeData(dataFd.fd_id,key)\">\n" +
    "                                    <span class=\"glyphicon glyphicon-remove-circle\"></span>\n" +
    "                                    {{value}}\n" +
    "                                </li>\n" +
    "                            </ul>\n" +
    "                        </li>\n" +
    "                    </ul>\n" +
    "                </div>\n" +
    "            </fieldset>\n" +
    "\n" +
    "            <div class=\"col-md-12\">\n" +
    "                <button type=\"submit\" class=\"btn btn-default\">Envoyer les données</button>\n" +
    "            </div>\n" +
    "        </form>\n" +
    "    </div>\n" +
    "\n" +
    "    <div class=\"selectData col-md-6\">\n" +
    "        <div class=\"col-md-6\">\n" +
    "            <legend>Fournisseurs de données</legend>\n" +
    "            <input type=\"search\" class=\"form-control\" id=\"filterData\" placeholder=\"Rechercher une donnée\" ng-model=\"filterData\">\n" +
    "            <ul class=\"list-fd\">\n" +
    "                <li ng-repeat=\"dataFd in dataAvailable | filter:filterData\" ng-click=\"selectFd(dataFd)\" ng-class=\"selectedFd.fd_id == dataFd.fd_id ? 'selected' : ''\">\n" +
    "                    {{dataFd.fd_name}}\n" +
    "                </li>\n" +
    "            </ul>\n" +
    "        </div>\n" +
    "        <div class=\"col-md-6\" ng-if=\"selectedFd\">\n" +
    "            <legend>Données disponibles</legend>\n" +
    "            <ul class=\"list-data\">\n" +
    "                <li ng-repeat=\"(key, value) in selectedFd.fd_provided_info\" ng-class=\"isDataSelected(key) ? 'selected' : ''\" ng-click=\"selectData(key)\">\n" +
    "                    {{value}}\n" +
    "                </li>\n" +
    "            </ul>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "</div>\n" +
    "\n" +
    "<div class=\"row\" ng-if=\"formSent && formBack\">\n" +
    "    <div class=\"col-md-12 col-md-offset-3\">\n" +
    "        <span class=\"text-danger\" ng-if=\"buttonCreated.code !== '200'\">Erreur lors de la génération du bouton : {{buttonCreated.message}}</span>\n" +
    "        <div ng-if=\"buttonCreated.code === '200'\">\n" +
    "            <p class=\"text-success\">Bouton créé avec succès !</p>\n" +
    "\n" +
    "            <!-- Image BTN -->\n" +
    "\n" +
    "            <!-- balise <code> -->\n" +
    "            <p class=\"text-info\">\n" +
    "                Exemple du rendu du bouton :\n" +
    "            </p>\n" +
    "            <div ng-bind-html=\"generateButtonCode(false)\"></div>\n" +
    "\n" +
    "\n" +
    "            <p>Vous pouvez copier/coller le code suivant sur votre site web afin d'utiliser ce formulaire :</p>\n" +
    "            <pre class=\"col-md-6\">\n" +
    "                {{generateButtonCode(true)}}\n" +
    "            </pre>\n" +
    "\n" +
    "\n" +
    "        </div>\n" +
    "\n" +
    "    </div>\n" +
    "\n" +
    "    <div class=\"col-md-12\">\n" +
    "        <div class=\"col-md-2  col-md-offset-5\">\n" +
    "            <p>QR Code du lien :</p>\n" +
    "            <qrcode data=\"{{buttonCreated.response.url_btn}}\" version=\"4\" size=\"150\" download></qrcode>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "</div>\n" +
    "");
}]);

angular.module("valid/valid.tpl.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("valid/valid.tpl.html",
    "<div class=\"col-md-12\" style=\"text-align: center;\">\n" +
    "    <span class=\"glyphicon glyphicon-ok text-success\" style=\"font-size: 50px;\"></span>\n" +
    "    <p style=\"font-size: 30px;\">Merci d'avoir validé ce formulaire</p>\n" +
    "</div>\n" +
    "");
}]);
