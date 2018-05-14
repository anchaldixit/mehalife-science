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
    self.close = ".close_visit";
    self.comment = ".add_comment_link";
    self.save = function(){
         params = jQuery(self.selector).serializeArray();
         $collector.process(params, self.afterSave);
    }
    self.afterSave = function(){
        //location.reload();
        offset = window.location.href.indexOf('?');
        length = offset >= 0 ? offset: window.location.href.length
        window.location = window.location.href.substring(0,length)+'?msg=success'
        window.location.reload();
    }
    self.initEvents = function(){
        jQuery(self.button).on('click',function(){
            self.save();
        });
        jQuery(self.close).on('click',function(){
            id = jQuery(this).attr('data-visit-id');
            console.log('iddd',id)
            self.closeIt(id);
            //Show confirmation msg
            //refresh
        });
        jQuery(self.comment).on('click',function(){
            id = jQuery(this).attr('data-visit-id');

            //show add new comment box
            //scroll to that point
        });
    }
    self.closeIt = function(id){
        //close it
        var params = [{'name':'call','value':'closeit'},{'name':'id','value':id}];
        //var params = [{'call':'closeit'},{'id':id}];

        $collector.process(params, self.afterCloseIt);

    }
    self.afterCloseIt = function(){
        alert('Visit Closed Successfully');
        window.location.reload();
    }
    self.saveComment = function(){
        //save
        //Close the 
    }
    self.afterSaveComment = function(){
        //CLose dialoge
        //refresh page
        //show msg
    }
}
jQuery(document).ready(function(){
    tm = new TaskManagement();
    tm.initEvents();
    jQuery('#add-new').click(function(){
        jQuery("#task-form").fadeIn('slow');
    });
});