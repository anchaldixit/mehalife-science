var Collection = function () {
    var self = this;
    self.data;
    self.loader = false;
    self.loader_class = 'loader';//default
    self.process = function (params, callback) {

        if (self.loader) {
            jQuery('.' + self.loader_class).css('display', 'block');
        }
        jQuery.ajax({
            dataType: "json",
            url: "/wp-content/themes/meha/taskmanagement/ajax/request.php",
            data: params,
            cache: true
        }).done(function (resp) {
            //console.log(resp);
            if (resp.error == 'failed') {
                //leaving blank for now
                //may be hide directory if data is not there
                alert(':(');
            } else {
                self.data = resp;
                if (callback !== undefined) {
                    callback.call();
                }
            }
            if (self.loader) {
                jQuery('.' + self.loader_class).css('display', 'none');
            }
        });
    };
};

var $collector = new Collection();
var TaskManagement = function () {

    var self = this;
    self.selector = '#task-form';
    self.button = "#task-form #submit-button";
    self.save = function(){
         params = jQuery(self.selector).serializeArray();
         $collector.process(params, self.afterSave);
    }
    self.afterSave = function(){
        //location.reload();
        window.location = window.location.href+'?msg=success'
    }
    self.submitEventAction = function(){
        jQuery(self.button).on('click',function(){
            self.save();
        });
    }
}
jQuery(document).ready(function(){
    tm = new TaskManagement();
    tm.submitEventAction();
});