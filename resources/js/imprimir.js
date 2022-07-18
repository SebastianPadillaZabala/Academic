
function print(printHtml) {
    var urlCss = "/resources/css/style.css";
    var iframe = document.createElement('iframe');
    var div = document.createElement('div');
    var tagStyle = document.createElement('link');
    tagStyle.setAttribute("rel","stylesheet");
    tagStyle.setAttribute("type","text/css");
    tagStyle.setAttribute("href",urlCss);
    tagStyle.onload = function () {
        openPrint(iframe);
    }
    div.innerHTML = printHtml
    document.body.appendChild(iframe);
    iframe.contentDocument.body.appendChild(div);
    iframe.contentDocument.head.appendChild(tagStyle);
}

function openPrint(iframe) {
    if (navigator.userAgent.toLowerCase().indexOf("firefox") != -1) {
        iframe.contentWindow.print();
    } else {
        iframe.contentWindow.document.execCommand('print', false, null);
    }
    document.body.removeChild(iframe);
}