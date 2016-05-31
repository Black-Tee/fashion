function checkPassword(b){if(typeof b.elements.nopass!="undefined"&&b.elements.nopass[0].checked)return true;else if(typeof b.elements.pred_password!="undefined"&&(b.elements.pred_password.value=="none"||b.elements.pred_password.value=="keep"))return true;var d=b.elements.pma_pw;b=b.elements.pma_pw2;var a=false;if(d.value=="")a=PMA_messages.strPasswordEmpty;else if(d.value!=b.value)a=PMA_messages.strPasswordNotSame;if(a){alert(a);d.value="";b.value="";d.focus();return false}return true}
function checkAddUser(b){if(b.elements.pred_hostname.value=="userdefined"&&b.elements.hostname.value==""){alert(PMA_messages.strHostEmpty);b.elements.hostname.focus();return false}if(b.elements.pred_username.value=="userdefined"&&b.elements.username.value==""){alert(PMA_messages.strUserEmpty);b.elements.username.focus();return false}return checkPassword(b)}
function appendNewUser(b,d,a){var c=$("#usersForm").find("tbody").find("tr:last"),e=$("#usersForm").find("tbody").find("tr:first").find("label").html().substr(0,1).toUpperCase(),g=c.find("label").html().substr(0,1).toUpperCase(),f=c.find("input:checkbox").attr("id").match(/\d+/)[0];f="checkbox_sel_users_"+(parseFloat(f)+1);e=e!=g?true:false;if(g==d||e)$(b).insertAfter(c).find("input:checkbox").attr("id",f).val(function(){return $(this).val().replace(/&/,"&amp;")}).end().find("label").attr("for",f).end();
$("#usersForm").find("tbody").PMA_sort_table("label");$("#initials_table").find("td:contains("+d+")").html(a)}
$(document).ready(function(){$("#fieldset_add_user a.ajax").live("click",function(b){b.preventDefault();var d=PMA_ajaxShowMessage(),a={};a[PMA_messages.strAddUser]=function(){var c=$(this).find("form[name=usersForm]").last();if(!checkAddUser(c.get(0))){PMA_ajaxShowMessage(PMA_messages.strFormEmpty);return false}$.post(c.attr("action"),c.serialize()+"&adduser_submit="+$(this).find("input[name=adduser_submit]").attr("value"),function(e){if(e.success==true){$("#add_user_dialog #createdb_1:checked").length&&
window.parent&&window.parent.refreshNavigation(true);$("#add_user_dialog").dialog("close");PMA_ajaxShowMessage(e.message);$("#floating_menubar").next("div").remove().end().after(e.sql_query);var g=$("#floating_menubar").next("div").find(".notice");g.text()==""&&g.remove();if($("#fieldset_add_user a.ajax").attr("name")=="db_specific"){e=$("#fieldset_add_user a.ajax").attr("rel");if(e.substring(e.length-23,e.length)=="&goto=db_operations.php")e=e.substring(0,e.length-23);e+="&ajax_request=true&db_specific=true";
$.post(c.attr("action"),e,function(f){$("#userFormDiv").length!=0?$("#userFormDiv").remove():$("#usersForm").remove();var h=$('<div id="userFormDiv"></div>');if(typeof f.success!="undefined")f.success==true?h.html(f.user_form).insertAfter("#result_query"):PMA_ajaxShowMessage(PMA_messages.strErrorProcessingRequest+" : "+f.error,false);else{f=$.parseJSON(f);h.html(f.user_form).insertAfter("#result_query")}})}else appendNewUser(e.new_user_string,e.new_user_initial,e.new_user_initial_string)}else PMA_ajaxShowMessage(PMA_messages.strErrorProcessingRequest+
" : "+e.error,false)})};a[PMA_messages.strCancel]=function(){$(this).dialog("close")};$.get($(this).attr("href"),{ajax_request:true},function(c){c=$('<div id="add_user_dialog"></div>').prepend(c).find("#fieldset_add_user_footer").hide().end().find("form[name=usersForm]").append('<input type="hidden" name="ajax_request" value="true" />').end().dialog({title:PMA_messages.strAddUser,width:800,height:600,modal:true,buttons:a,close:function(){$(this).remove()}});displayPasswordGenerateButton();PMA_convertFootnotesToTooltips(c);
PMA_ajaxRemoveMessage(d)})});$("#reload_privileges_anchor.ajax").live("click",function(b){b.preventDefault();var d=PMA_ajaxShowMessage(PMA_messages.strReloadingPrivileges);$.get($(this).attr("href"),{ajax_request:true},function(a){a.success==true?PMA_ajaxRemoveMessage(d):PMA_ajaxShowMessage(a.error,false)})});$("#fieldset_delete_user_footer #buttonGo.ajax").live("click",function(b){b.preventDefault();PMA_ajaxShowMessage(PMA_messages.strRemovingSelectedUsers);$form=$("#usersForm");$.post($form.attr("action"),
$form.serialize()+"&delete="+$(this).attr("value")+"&ajax_request=true",function(d){if(d.success==true){PMA_ajaxShowMessage(d.message);$("#checkbox_drop_users_db:checked").length&&window.parent&&window.parent.refreshNavigation(true);$form.find("input:checkbox:checked").parents("tr").slideUp("medium",function(){var a=$(this).find("input:checkbox").val().charAt(0).toUpperCase();$(this).remove();$("#tableuserrights").find("input:checkbox[value^="+a+"]").length==0&&$("#initials_table").find("td > a:contains("+
a+")").parent("td").html(a);$form.find("tbody").find("tr:odd").removeClass("even").addClass("odd").end().find("tr:even").removeClass("odd").addClass("even")})}else PMA_ajaxShowMessage(d.error,false)})});$(".edit_user_anchor.ajax").live("click",function(b){b.preventDefault();var d=PMA_ajaxShowMessage();$(this).parents("tr").addClass("current_row");var a={};a[PMA_messages.strCancel]=function(){$(this).dialog("close")};b=$(this).parents("form").find('input[name="token"]').val();$.get($(this).attr("href"),
{ajax_request:true,edit_user_dialog:true,token:b},function(c){c=$('<div id="edit_user_dialog"></div>').append(c).dialog({width:900,height:600,buttons:a,close:function(){$(this).remove()}});displayPasswordGenerateButton();PMA_ajaxRemoveMessage(d);PMA_convertFootnotesToTooltips(c)})});$("#edit_user_dialog").find("form:not(#db_or_table_specific_priv)").live("submit",function(b){b.preventDefault();PMA_ajaxShowMessage(PMA_messages.strProcessingRequest);$(this).append('<input type="hidden" name="ajax_request" value="true" />');
b=$(this).find(".tblFooters").find("input:submit").attr("name");var d=$(this).find(".tblFooters").find("input:submit").val();$.post($(this).attr("action"),$(this).serialize()+"&"+b+"="+d,function(a){if(a.success==true){PMA_ajaxShowMessage(a.message);$("#edit_user_dialog").dialog("close");if(a.sql_query){$("#floating_menubar").next("div").remove().end().after(a.sql_query);var c=$("#floating_menubar").next("div").find(".notice");$(c).text()==""&&$(c).remove()}a.new_user_string&&appendNewUser(a.new_user_string,
a.new_user_initial,a.new_user_initial_string);c=!!$("#dbspecificuserrights").length;var e=false;if(a.db_specific_privs==false||c==a.db_specific_privs)e=true;a.new_privileges&&e&&$("#usersForm").find(".current_row").find("tt").html(a.new_privileges);$("#usersForm").find(".current_row").removeClass("current_row")}else PMA_ajaxShowMessage(a.error,false)})});$(".export_user_anchor.ajax").live("click",function(b){b.preventDefault();var d=PMA_ajaxShowMessage(),a={};a[PMA_messages.strClose]=function(){$(this).dialog("close")};
$.get($(this).attr("href"),{ajax_request:true},function(c){c=$("<div />").append(c.message).dialog({title:c.title,width:500,buttons:a,close:function(){$(this).remove()}});PMA_ajaxRemoveMessage(d);CodeMirror.fromTextArea(c.find("textarea")[0],{lineNumbers:true,matchBrackets:true,indentUnit:4,mode:"text/x-mysql"})})});$("#initials_table.ajax").find("a").live("click",function(b){b.preventDefault();var d=PMA_ajaxShowMessage();$.get($(this).attr("href"),{ajax_request:true},function(a){$("#usersForm").hide("medium").remove();
$("#fieldset_add_user").hide("medium").remove();$("#initials_table").after(a).show("medium").siblings("h2").not(":first").remove();PMA_ajaxRemoveMessage(d)})});$("#checkbox_drop_users_db").click(function(){$this_checkbox=$(this);if($this_checkbox.is(":checked"))confirm(PMA_messages.strDropDatabaseStrongWarning+"\n"+PMA_messages.strDoYouReally+" :\nDROP DATABASE")||$this_checkbox.attr("checked",false)});displayPasswordGenerateButton()},"top.frame_content");
