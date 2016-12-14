/*
Copyright 2015 OCAD University

Licensed under the Educational Community License (ECL), Version 2.0 or the New
BSD license. You may not use this file except in compliance with one these
Licenses.

You may obtain a copy of the ECL 2.0 License and BSD License at
https://github.com/fluid-project/infusion/raw/master/Infusion-LICENSE.txt
*/

$(document).ready(function () {

    var tocPlaceholder = "<div class='flc-toc-tocContainer toc'> </div>";
    var uioTemplateSpec = {
        uioTemplate : {
            href : phpData.pluginUrl + "template.html"
        }
    };

    // Fetch the template text, and when we have it, proceed
    fluid.fetchResources(uioTemplateSpec, function (spec) {

        // Add the sliding panel template to the page
        $(phpData.uioTemplateSelector).prepend(spec.uioTemplate.resourceText);

        // Add the table of contents placeholder to the page
        $(phpData.uioTocSelector).prepend(tocPlaceholder);

        // Create the prefs editor
        fluid.uiOptions.prefsEditor(".flc-prefsEditor-separatedPanel", {
            terms: {
                "templatePrefix": phpData.pluginUrl + "lib/infusion/src/framework/preferences/html",
                "messagePrefix": phpData.pluginUrl + "lib/infusion/src/framework/preferences/messages"
            },
            "tocTemplate": phpData.pluginUrl + "lib/infusion/src/components/tableOfContents/html/TableOfContents.html"
        });
    });
});
