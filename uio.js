
 // Investigate whether or not WordPress Widgets could help with this
 // Concern regarding Widgets: Placement within the DOM
 $(document).ready(function () {

    // Add the sliding panel template to the page
    $(phpData.uioTemplateSelector).prepend(
    "        <!-- BEGIN markup for Preference Editor -->" +
    "        <div class='flc-prefsEditor-separatedPanel fl-prefsEditor-separatedPanel'>" +
    "            <!-- This is the div that will contain the Preference Editor component -->" +
    "            <div class='flc-slidingPanel-panel flc-prefsEditor-iframe'></div>" +
    
    "            <!-- This div is for the sliding panel that shows and hides the Preference Editor controls -->" +
    "            <div class='fl-panelBar'>" +
    "                <span class='fl-prefsEditor-buttons'>" +
    "                    <button id='reset' class='flc-prefsEditor-reset fl-prefsEditor-reset'><span class='fl-icon-undo'></span> Reset</button>" +
    "                    <button id='show-hide' class='flc-slidingPanel-toggleButton fl-prefsEditor-showHide'> Show/Hide</button>" +
    "                </span>" +
    "            </div>" +
    "        </div>" +
    "        <!-- END markup for Preference Editor -->"
    );

    // Add the table of contents placeholder to the page
    // The location of this should be controlled through the admin interface
    // Right now, this assumes that a <header>element with the ID 'branding' exists
    // and is an appropriate place
    $(phpData.uioTocSelector).prepend("<div class='flc-toc-tocContainer toc'> </div>");

    // Create the prefs editor
     fluid.uiOptions.prefsEditor(".flc-prefsEditor-separatedPanel", {
        "templatePrefix": phpData.pluginUrl + "lib/infusion/src/framework/preferences/html/",
        "messagePrefix": phpData.pluginUrl + "lib/infusion/src/framework/preferences/messages/",
        "tocTemplate": phpData.pluginUrl + "lib/infusion/src/components/tableOfContents/html/TableOfContents.html"
    });
});
