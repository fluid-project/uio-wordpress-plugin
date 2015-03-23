This version of Infusion was created using a custom build from the master branch:

    https://github.com/fluid-project/infusion/
    commit 18939c0dd614901bfc434a29f880aa332600a239

using the command line:
    grunt custom --source=true --include="uiOptions" --name="uio"

The following directories and files were stripped out of the build, since they contain
code that is included in the infusion-uio.js file or is not required by this plugin:

* src/lib/infusion/src/components/overviewPanel/js/
* src/lib/infusion/src/components/overviewPanel/overviewPanelDependencies.json
* src/lib/infusion/src/components/slidingPanel/
* src/lib/infusion/src/components/tableOfContents/js/
* src/lib/infusion/src/components/tableOfContents/tableOfContentsDependencies.json
* src/lib/infusion/src/components/tabs/
* src/lib/infusion/src/components/textfieldSlider/
* src/lib/infusion/src/components/tooltip/
* src/lib/infusion/src/components/uiOptions/
* src/lib/infusion/src/framework/core/
* src/lib/infusion/src/framework/enhancement/
* src/lib/infusion/src/framework/preferences/js/
* src/lib/infusion/src/framework/preferences/preferencesDependencies.json
* src/lib/infusion/src/framework/renderer/
* src/lib/infusion/src/lib/fastXmlPull/
* src/lib/infusion/src/lib/jquery/core/
* src/lib/infusion/src/lib/jquery/plugins/
* src/lib/infusion/src/lib/jquery/ui/jQueryUICoreDependencies.json
* src/lib/infusion/src/lib/jquery/ui/jQueryUIWidgetsDependencies.json
* src/lib/infusion/src/lib/jquery/ui/js/
* src/lib/infusion/src/lib/json/
* README.md
