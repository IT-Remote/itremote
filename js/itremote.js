$(document).ready(function() {
    var $header = $('span.status.rounded-1');
    var $button;

    function updateButton() {
        var fullText = $header.text().trim();
        var splitText = fullText.split(' - ');

        var computerName = splitText.length > 1 ? splitText.slice(1).join(' - ').trim() : '';

        var encode = encodeURIComponent(computerName);
        var buttonHtml = '<a class="btn btn-outline-secondary" style="margin-left: 20px;" href="https://control.itremote.com/Remote/OpenAccess?deviceName=' + encode + '" target="_blank" class="btn btn-primary">IT Remote</a>';

        if ($button) {
            $button.remove();
        }

        $button = $(buttonHtml);
        $('span.status.rounded-1').after($button);
    }

    var checkTextInterval = setInterval(function() {
        if ($header.text().trim() !== '') {
            clearInterval(checkTextInterval);
            updateButton();
            $header.on('DOMSubtreeModified', updateButton);
        }
    }, 1000);
});
