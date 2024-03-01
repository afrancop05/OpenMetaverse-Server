function copyApiLink(self) {
    navigator.clipboard.writeText(location.protocol + location.host + "/api/content/" + self.value);
}

$(function() {
    $("#copy-api").click(function() {
        copyApiLink(this.value);
    });
});
