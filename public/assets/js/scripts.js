!function(e){"use strict";var t=e(window),a=function(t){if(t.valAttr("error-msg-container"))return e(t.valAttr("error-msg-container"));var a=t.parent();if(!a.hasClass("form-group")&&!a.closest("form").hasClass("form-horizontal")){var n=a.closest(".form-group");if(n.length)return n.eq(0)}return a},n=function(e,t){e.addClass(t.errorElementClass).removeClass("valid"),a(e).addClass(t.inputParentClassOnError).removeClass(t.inputParentClassOnSuccess),""!==t.borderColorOnError&&e.css("border-color",t.borderColorOnError)},r=function(t,n){t.each(function(){var t=e(this);i(t,"",n,n.errorMessagePosition),t.removeClass("valid").removeClass(n.errorElementClass).css("border-color",""),a(t).removeClass(n.inputParentClassOnError).removeClass(n.inputParentClassOnSuccess).find("."+n.errorMessageClass).remove()})},i=function(n,r,i,o){var s=document.getElementById(n.attr("name")+"_err_msg"),l=function(e){t.trigger("validationErrorDisplay",[n,e]),e.html(r)};if(s)l(e(s));else if("object"==typeof o){var d=!1;if(o.find("."+i.errorMessageClass).each(function(){return this.inputReferer==n[0]?(d=e(this),!1):void 0}),d)r?l(d):d.remove();else{var u=e('<div class="'+i.errorMessageClass+'"></div>');l(u),u[0].inputReferer=n[0],o.prepend(u)}}else{var c=a(n),u=c.find("."+i.errorMessageClass+".help-block");0==u.length&&(u=e("<span></span>").addClass("help-block").addClass(i.errorMessageClass),u.appendTo(c)),l(u)}},o=function(t,a,n,r){var i,o=r.errorMessageTemplate.messages.replace(/\{errorTitle\}/g,a),s=[];e.each(n,function(e,t){s.push(r.errorMessageTemplate.field.replace(/\{msg\}/g,t))}),o=o.replace(/\{fields\}/g,s.join("")),i=r.errorMessageTemplate.container.replace(/\{errorMessageClass\}/g,r.errorMessageClass),i=i.replace(/\{messages\}/g,o),t.children().eq(0).before(i)};e.fn.validateOnBlur=function(t,a){return this.find("*[data-validation]").bind("blur.validation",function(){e(this).validateInputOnBlur(t,a,!0,"blur")}),a.validateCheckboxRadioOnClick&&this.find("input[type=checkbox][data-validation],input[type=radio][data-validation]").bind("click.validation",function(){e(this).validateInputOnBlur(t,a,!0,"click")}),this},e.fn.validateOnEvent=function(t,a){return this.find("*[data-validation-event]").each(function(){var n=e(this),r=n.valAttr("event");r&&n.unbind(r+".validation").bind(r+".validation",function(){e(this).validateInputOnBlur(t,a,!0,r)})}),this},e.fn.showHelpOnFocus=function(t){return t||(t="data-validation-help"),this.find(".has-help-txt").valAttr("has-keyup-event",!1).removeClass("has-help-txt"),this.find("textarea,input").each(function(){var a=e(this),n="jquery_form_help_"+(a.attr("name")||"").replace(/(:|\.|\[|\])/g,""),r=a.attr(t);r&&a.addClass("has-help-txt").unbind("focus.help").bind("focus.help",function(){var t=a.parent().find("."+n);0==t.length&&(t=e("<span />").addClass(n).addClass("help").addClass("help-block").text(r).hide(),a.after(t)),t.fadeIn()}).unbind("blur.help").bind("blur.help",function(){e(this).parent().find("."+n).fadeOut("slow")})}),this},e.fn.validate=function(t,a,n){var r=e.extend({},e.formUtils.LANG,n||{});this.each(function(){var n=e(this),i=n.closest("form").get(0).validationConfig||{};n.one("validation",function(e,a){"function"==typeof t&&t(a,this,e)}),n.validateInputOnBlur(r,e.extend({},i,a||{}),!0)})},e.fn.willPostponeValidation=function(){return(this.valAttr("suggestion-nr")||this.valAttr("postpone")||this.hasClass("hasDatepicker"))&&!window.postponedValidation},e.fn.validateInputOnBlur=function(t,o,s,l){if(e.formUtils.eventType=l,this.willPostponeValidation()){var d=this,u=this.valAttr("postpone")||200;return window.postponedValidation=function(){d.validateInputOnBlur(t,o,s,l),window.postponedValidation=!1},setTimeout(function(){window.postponedValidation&&window.postponedValidation()},u),this}t=e.extend({},e.formUtils.LANG,t||{}),r(this,o);var c=this,g=c.closest("form"),f=(c.attr(o.validationRuleAttribute),e.formUtils.validateInput(c,t,o,g,l));return f.isValid?f.shouldChangeDisplay&&(c.addClass("valid"),a(c).addClass(o.inputParentClassOnSuccess)):f.isValid||(n(c,o),i(c,f.errorMsg,o,o.errorMessagePosition),s&&c.unbind("keyup.validation").bind("keyup.validation",function(){e(this).validateInputOnBlur(t,o,!1,"keyup")})),this},e.fn.valAttr=function(e,t){return void 0===t?this.attr("data-validation-"+e):t===!1||null===t?this.removeAttr("data-validation-"+e):(e.length>0&&(e="-"+e),this.attr("data-validation"+e,t))},e.fn.isValid=function(s,l,d){if(e.formUtils.isLoadingModules){var u=this;return setTimeout(function(){u.isValid(s,l,d)},200),null}l=e.extend({},e.formUtils.defaultConfig(),l||{}),s=e.extend({},e.formUtils.LANG,s||{}),d=d!==!1,e.formUtils.errorDisplayPreventedWhenHalted&&(delete e.formUtils.errorDisplayPreventedWhenHalted,d=!1),e.formUtils.isValidatingEntireForm=!0,e.formUtils.haltValidation=!1;var c=function(t,a){e.inArray(t,f)<0&&f.push(t),h.push(a),a.attr("current-error",t),d&&n(a,l)},g=[],f=[],h=[],m=this,v=function(t,a){return"submit"===a||"button"===a||"reset"==a?!0:e.inArray(t,l.ignore||[])>-1};if(d&&(m.find("."+l.errorMessageClass+".alert").remove(),r(m.find("."+l.errorElementClass+",.valid"),l)),m.find("input,textarea,select").filter(':not([type="submit"],[type="button"])').each(function(){var t=e(this),n=t.attr("type"),r="radio"==n||"checkbox"==n,i=t.attr("name");if(!v(i,n)&&(!r||e.inArray(i,g)<0)){r&&g.push(i);var o=e.formUtils.validateInput(t,s,l,m,"submit");o.shouldChangeDisplay&&(o.isValid?o.isValid&&(t.valAttr("current-error",!1).addClass("valid"),a(t).addClass(l.inputParentClassOnSuccess)):c(o.errorMsg,t))}}),"function"==typeof l.onValidate){var p=l.onValidate(m);e.isArray(p)?e.each(p,function(e,t){c(t.message,t.element)}):p&&p.element&&p.message&&c(p.message,p.element)}return e.formUtils.isValidatingEntireForm=!1,!e.formUtils.haltValidation&&h.length>0?(d&&("top"===l.errorMessagePosition?o(m,s.errorTitle,f,l):"custom"===l.errorMessagePosition?"function"==typeof l.errorMessageCustom&&l.errorMessageCustom(m,s.errorTitle,f,l):e.each(h,function(e,t){i(t,t.attr("current-error"),l,l.errorMessagePosition)}),l.scrollToTopOnError&&t.scrollTop(m.offset().top-20)),!1):(!d&&e.formUtils.haltValidation&&(e.formUtils.errorDisplayPreventedWhenHalted=!0),!e.formUtils.haltValidation)},e.fn.validateForm=function(e,t){return window.console&&"function"==typeof window.console.warn&&window.console.warn("Use of deprecated function $.validateForm, use $.isValid instead"),this.isValid(e,t,!0)},e.fn.restrictLength=function(t){return new e.formUtils.lengthRestriction(this,t),this},e.fn.addSuggestions=function(t){var a=!1;return this.find("input").each(function(){var n=e(this);a=e.split(n.attr("data-suggestions")),a.length>0&&!n.hasClass("has-suggestions")&&(e.formUtils.suggest(n,a,t),n.addClass("has-suggestions"))}),this},e.split=function(t,a){if("function"!=typeof a){if(!t)return[];var n=[];return e.each(t.split(a?a:/[,|\-\s]\s*/g),function(t,a){a=e.trim(a),a.length&&n.push(a)}),n}t&&e.each(t.split(/[,|\-\s]\s*/g),function(t,n){return n=e.trim(n),n.length?a(n,t):void 0})},e.validate=function(a){var n=e.extend(e.formUtils.defaultConfig(),{form:"form",validateOnEvent:!1,validateOnBlur:!0,validateCheckboxRadioOnClick:!0,showHelpOnFocus:!0,addSuggestions:!0,modules:"",onModulesLoaded:null,language:!1,onSuccess:!1,onError:!1,onElementValidate:!1});if(a=e.extend(n,a||{}),a.lang&&"en"!=a.lang){var i="lang/"+a.lang+".js";a.modules+=a.modules.length?","+i:i}e(a.form).each(function(n,i){i.validationConfig=a;var o=e(i);t.trigger("formValidationSetup",[o,a]),o.find(".has-help-txt").unbind("focus.validation").unbind("blur.validation"),o.removeClass("has-validation-callback").unbind("submit.validation").unbind("reset.validation").find("input[data-validation],textarea[data-validation]").unbind("blur.validation"),o.bind("submit.validation",function(){var t=e(this);if(e.formUtils.haltValidation)return!1;if(e.formUtils.isLoadingModules)return setTimeout(function(){t.trigger("submit.validation")},200),!1;var n=t.isValid(a.language,a);if(e.formUtils.haltValidation)return!1;if(!n||"function"!=typeof a.onSuccess)return n||"function"!=typeof a.onError?n:(a.onError(t),!1);var r=a.onSuccess(t);return r===!1?!1:void 0}).bind("reset.validation",function(){e(this).find("."+a.errorMessageClass+".alert").remove(),r(e(this).find("."+a.errorElementClass+",.valid"),a)}).addClass("has-validation-callback"),a.showHelpOnFocus&&o.showHelpOnFocus(),a.addSuggestions&&o.addSuggestions(),a.validateOnBlur&&(o.validateOnBlur(a.language,a),o.bind("html5ValidationAttrsFound",function(){o.validateOnBlur(a.language,a)})),a.validateOnEvent&&o.validateOnEvent(a.language,a)}),""!=a.modules&&e.formUtils.loadModules(a.modules,!1,function(){"function"==typeof a.onModulesLoaded&&a.onModulesLoaded(),t.trigger("validatorsLoaded",["string"==typeof a.form?e(a.form):a.form,a])})},e.formUtils={defaultConfig:function(){return{ignore:[],errorElementClass:"error",borderColorOnError:"#b94a48",errorMessageClass:"form-error",validationRuleAttribute:"data-validation",validationErrorMsgAttribute:"data-validation-error-msg",errorMessagePosition:"element",errorMessageTemplate:{container:'<div class="{errorMessageClass} alert alert-danger">{messages}</div>',messages:"<strong>{errorTitle}</strong><ul>{fields}</ul>",field:"<li>{msg}</li>"},errorMessageCustom:o,scrollToTopOnError:!0,dateFormat:"yyyy-mm-dd",addValidClassOnAll:!1,decimalSeparator:".",inputParentClassOnError:"has-error",inputParentClassOnSuccess:"has-success",validateHiddenInputs:!1}},validators:{},_events:{load:[],valid:[],invalid:[]},haltValidation:!1,isValidatingEntireForm:!1,addValidator:function(e){var t=0===e.name.indexOf("validate_")?e.name:"validate_"+e.name;void 0===e.validateOnKeyUp&&(e.validateOnKeyUp=!0),this.validators[t]=e},isLoadingModules:!1,loadedModules:{},loadModules:function(a,n,r){if(void 0===r&&(r=!0),e.formUtils.isLoadingModules)return void setTimeout(function(){e.formUtils.loadModules(a,n,r)});var i=!1,o=function(a,n){var o=e.split(a),s=o.length,l=function(){s--,0==s&&(e.formUtils.isLoadingModules=!1,r&&i&&("function"==typeof r?r():t.trigger("validatorsLoaded")))};s>0&&(e.formUtils.isLoadingModules=!0);var d="?_="+(new Date).getTime(),u=document.getElementsByTagName("head")[0]||document.getElementsByTagName("body")[0];e.each(o,function(t,a){if(a=e.trim(a),0==a.length)l();else{var r=n+a+(".js"==a.slice(-3)?"":".js"),o=document.createElement("SCRIPT");r in e.formUtils.loadedModules?l():(e.formUtils.loadedModules[r]=1,i=!0,o.type="text/javascript",o.onload=l,o.src=r+(".dev.js"==r.slice(-7)?d:""),o.onerror=function(){"console"in window&&window.console.log&&window.console.log("Unable to load form validation module "+r)},o.onreadystatechange=function(){("complete"==this.readyState||"loaded"==this.readyState)&&(l(),this.onload=null,this.onreadystatechange=null)},u.appendChild(o))}})};if(n)o(a,n);else{var s=function(){var t=!1;return e('script[src*="form-validator"]').each(function(){return t=this.src.substr(0,this.src.lastIndexOf("/"))+"/","/"==t&&(t=""),!1}),t!==!1?(o(a,t),!0):!1};s()||e(s)}},validateInput:function(t,a,n,r,i){t.trigger("beforeValidation"),n=n||e.formUtils.defaultConfig(),a=a||e.formUtils.LANG;var o=t.val()||"",s={isValid:!0,shouldChangeDisplay:!0,errorMsg:""},l=t.valAttr("optional"),d=!1,u=!1,c=!1,g=t.valAttr("if-checked");if(t.attr("disabled")||!t.is(":visible")&&!n.validateHiddenInputs)return s.shouldChangeDisplay=!1,s;null!=g&&(d=!0,c=r.find('input[name="'+g+'"]'),c.prop("checked")&&(u=!0));var f=!o&&"number"==t[0].type;if(!o&&"true"===l&&!f||d&&!u)return s.shouldChangeDisplay=n.addValidClassOnAll,s;var h=t.attr(n.validationRuleAttribute),m=!0;return h?(e.split(h,function(s){0!==s.indexOf("validate_")&&(s="validate_"+s);var l=e.formUtils.validators[s];if(!l||"function"!=typeof l.validatorFunction)throw new Error('Using undefined validator "'+s+'"');"validate_checkbox_group"==s&&(t=r.find("[name='"+t.attr("name")+"']:eq(0)"));var d=null;return("keyup"!=i||l.validateOnKeyUp)&&(d=l.validatorFunction(o,t,n,a,r)),d?void 0:(m=null,null!==d&&(m=t.attr(n.validationErrorMsgAttribute+"-"+s.replace("validate_","")),m||(m=t.attr(n.validationErrorMsgAttribute),m||(m=a[l.errorMessageKey],m||(m=l.errorMessage)))),!1)}," "),"string"==typeof m?(t.trigger("validation",!1),s.errorMsg=m,s.isValid=!1,s.shouldChangeDisplay=!0):null===m?s.shouldChangeDisplay=n.addValidClassOnAll:(t.trigger("validation",!0),s.shouldChangeDisplay=!0),"function"==typeof n.onElementValidate&&null!==m&&n.onElementValidate(s.isValid,t,r,m),s):(s.shouldChangeDisplay=n.addValidClassOnAll,s)},parseDate:function(t,a){var n,r,i,o,s=a.replace(/[a-zA-Z]/gi,"").substring(0,1),l="^",d=a.split(s||null);if(e.each(d,function(e,t){l+=(e>0?"\\"+s:"")+"(\\d{"+t.length+"})"}),l+="$",n=t.match(new RegExp(l)),null===n)return!1;var u=function(t,a,n){for(var r=0;r<a.length;r++)if(a[r].substring(0,1)===t)return e.formUtils.parseDateInt(n[r+1]);return-1};return i=u("m",d,n),r=u("d",d,n),o=u("y",d,n),2===i&&r>28&&(o%4!==0||o%100===0&&o%400!==0)||2===i&&r>29&&(o%4===0||o%100!==0&&o%400===0)||i>12||0===i?!1:this.isShortMonth(i)&&r>30||!this.isShortMonth(i)&&r>31||0===r?!1:[o,i,r]},parseDateInt:function(e){return 0===e.indexOf("0")&&(e=e.replace("0","")),parseInt(e,10)},isShortMonth:function(e){return e%2===0&&7>e||e%2!==0&&e>7},lengthRestriction:function(t,a){var n=parseInt(a.text(),10),r=0,i=function(){var e=t.val().length;if(e>n){var i=t.scrollTop();t.val(t.val().substring(0,n)),t.scrollTop(i)}r=n-e,0>r&&(r=0),a.text(r)};e(t).bind("keydown keyup keypress focus blur",i).bind("cut paste",function(){setTimeout(i,100)}),e(document).bind("ready",i)},numericRangeCheck:function(t,a){var n=e.split(a),r=parseInt(a.substr(3),10);return 1==n.length&&-1==a.indexOf("min")&&-1==a.indexOf("max")&&(n=[a,a]),2==n.length&&(t<parseInt(n[0],10)||t>parseInt(n[1],10))?["out",n[0],n[1]]:0===a.indexOf("min")&&r>t?["min",r]:0===a.indexOf("max")&&t>r?["max",r]:["ok"]},_numSuggestionElements:0,_selectedSuggestion:null,_previousTypedVal:null,suggest:function(a,n,r){var i={css:{maxHeight:"150px",background:"#FFF",lineHeight:"150%",textDecoration:"underline",overflowX:"hidden",overflowY:"auto",border:"#CCC solid 1px",borderTop:"none",cursor:"pointer"},activeSuggestionCSS:{background:"#E9E9E9"}},o=function(e,t){var a=t.offset();e.css({width:t.outerWidth(),left:a.left+"px",top:a.top+t.outerHeight()+"px"})};r&&e.extend(i,r),i.css.position="absolute",i.css["z-index"]=9999,a.attr("autocomplete","off"),0===this._numSuggestionElements&&t.bind("resize",function(){e(".jquery-form-suggestions").each(function(){var t=e(this),a=t.attr("data-suggest-container");o(t,e(".suggestions-"+a).eq(0))})}),this._numSuggestionElements++;var s=function(t){var a=t.valAttr("suggestion-nr");e.formUtils._selectedSuggestion=null,e.formUtils._previousTypedVal=null,e(".jquery-form-suggestion-"+a).fadeOut("fast")};return a.data("suggestions",n).valAttr("suggestion-nr",this._numSuggestionElements).unbind("focus.suggest").bind("focus.suggest",function(){e(this).trigger("keyup"),e.formUtils._selectedSuggestion=null}).unbind("keyup.suggest").bind("keyup.suggest",function(){var t=e(this),n=[],r=e.trim(t.val()).toLocaleLowerCase();if(r!=e.formUtils._previousTypedVal){e.formUtils._previousTypedVal=r;var l=!1,d=t.valAttr("suggestion-nr"),u=e(".jquery-form-suggestion-"+d);if(u.scrollTop(0),""!=r){var c=r.length>2;e.each(t.data("suggestions"),function(e,t){var a=t.toLocaleLowerCase();return a==r?(n.push("<strong>"+t+"</strong>"),l=!0,!1):void((0===a.indexOf(r)||c&&a.indexOf(r)>-1)&&n.push(t.replace(new RegExp(r,"gi"),"<strong>$&</strong>")))})}l||0==n.length&&u.length>0?u.hide():n.length>0&&0==u.length?(u=e("<div></div>").css(i.css).appendTo("body"),a.addClass("suggestions-"+d),u.attr("data-suggest-container",d).addClass("jquery-form-suggestions").addClass("jquery-form-suggestion-"+d)):n.length>0&&!u.is(":visible")&&u.show(),n.length>0&&r.length!=n[0].length&&(o(u,t),u.html(""),e.each(n,function(a,n){e("<div></div>").append(n).css({overflow:"hidden",textOverflow:"ellipsis",whiteSpace:"nowrap",padding:"5px"}).addClass("form-suggest-element").appendTo(u).click(function(){t.focus(),t.val(e(this).text()),s(t)})}))}}).unbind("keydown.validation").bind("keydown.validation",function(t){var a,n,r=t.keyCode?t.keyCode:t.which,o=e(this);if(13==r&&null!==e.formUtils._selectedSuggestion){if(a=o.valAttr("suggestion-nr"),n=e(".jquery-form-suggestion-"+a),n.length>0){var l=n.find("div").eq(e.formUtils._selectedSuggestion).text();o.val(l),s(o),t.preventDefault()}}else{a=o.valAttr("suggestion-nr"),n=e(".jquery-form-suggestion-"+a);var d=n.children();if(d.length>0&&e.inArray(r,[38,40])>-1){38==r?(null===e.formUtils._selectedSuggestion?e.formUtils._selectedSuggestion=d.length-1:e.formUtils._selectedSuggestion--,e.formUtils._selectedSuggestion<0&&(e.formUtils._selectedSuggestion=d.length-1)):40==r&&(null===e.formUtils._selectedSuggestion?e.formUtils._selectedSuggestion=0:e.formUtils._selectedSuggestion++,e.formUtils._selectedSuggestion>d.length-1&&(e.formUtils._selectedSuggestion=0));var u=n.innerHeight(),c=n.scrollTop(),g=n.children().eq(0).outerHeight(),f=g*e.formUtils._selectedSuggestion;return(c>f||f>c+u)&&n.scrollTop(f),d.removeClass("active-suggestion").css("background","none").eq(e.formUtils._selectedSuggestion).addClass("active-suggestion").css(i.activeSuggestionCSS),t.preventDefault(),!1}}}).unbind("blur.suggest").bind("blur.suggest",function(){s(e(this))}),a},LANG:{errorTitle:"Form submission failed!",requiredFields:"You have not answered all required fields",badTime:"You have not given a correct time",badEmail:"You have not given a correct e-mail address",badTelephone:"You have not given a correct phone number",badSecurityAnswer:"You have not given a correct answer to the security question",badDate:"You have not given a correct date",lengthBadStart:"The input value must be between ",lengthBadEnd:" characters",lengthTooLongStart:"The input value is longer than ",lengthTooShortStart:"The input value is shorter than ",notConfirmed:"Input values could not be confirmed",badDomain:"Incorrect domain value",badUrl:"The input value is not a correct URL",badCustomVal:"The input value is incorrect",andSpaces:" and spaces ",badInt:"The input value was not a correct number",badSecurityNumber:"Your social security number was incorrect",badUKVatAnswer:"Incorrect UK VAT Number",badStrength:"The password isn't strong enough",badNumberOfSelectedOptionsStart:"You have to choose at least ",badNumberOfSelectedOptionsEnd:" answers",badAlphaNumeric:"The input value can only contain alphanumeric characters ",badAlphaNumericExtra:" and ",wrongFileSize:"The file you are trying to upload is too large (max %s)",wrongFileType:"Only files of type %s is allowed",groupCheckedRangeStart:"Please choose between ",groupCheckedTooFewStart:"Please choose at least ",groupCheckedTooManyStart:"Please choose a maximum of ",groupCheckedEnd:" item(s)",badCreditCard:"The credit card number is not correct",badCVV:"The CVV number was not correct",wrongFileDim:"Incorrect image dimensions,",imageTooTall:"the image can not be taller than",imageTooWide:"the image can not be wider than",imageTooSmall:"the image was too small",min:"min",max:"max",imageRatioNotAccepted:"Image ratio is not be accepted",badBrazilTelephoneAnswer:"The phone number entered is invalid",badBrazilCEPAnswer:"The CEP entered is invalid",badBrazilCPFAnswer:"The CPF entered is invalid"}},e.formUtils.addValidator({name:"email",validatorFunction:function(t){var a=t.toLowerCase().split("@"),n=a[0],r=a[1];if(n&&r){if(0==n.indexOf('"')){var i=n.length;if(n=n.replace(/\"/g,""),n.length!=i-2)return!1}return e.formUtils.validators.validate_domain.validatorFunction(a[1])&&0!=n.indexOf(".")&&"."!=n.substring(n.length-1,n.length)&&-1==n.indexOf("..")&&!/[^\w\+\.\-\#\-\_\~\!\$\&\'\(\)\*\+\,\;\=\:]/.test(n)}return!1},errorMessage:"",errorMessageKey:"badEmail"}),e.formUtils.addValidator({name:"domain",validatorFunction:function(e){return e.length>0&&e.length<=253&&!/[^a-zA-Z0-9]/.test(e.slice(-2))&&!/[^a-zA-Z0-9]/.test(e.substr(0,1))&&!/[^a-zA-Z0-9\.\-]/.test(e)&&1==e.split("..").length&&e.split(".").length>1},errorMessage:"",errorMessageKey:"badDomain"}),e.formUtils.addValidator({name:"required",validatorFunction:function(t,a,n,r,i){switch(a.attr("type")){case"checkbox":return a.is(":checked");case"radio":return i.find('input[name="'+a.attr("name")+'"]').filter(":checked").length>0;default:return""!==e.trim(t)}},errorMessage:"",errorMessageKey:"requiredFields"}),e.formUtils.addValidator({name:"length",validatorFunction:function(t,a,n,r){var i=a.valAttr("length"),o=a.attr("type");if(void 0==i)return alert('Please add attribute "data-validation-length" to '+a[0].nodeName+" named "+a.attr("name")),!0;var s,l="file"==o&&void 0!==a.get(0).files?a.get(0).files.length:t.length,d=e.formUtils.numericRangeCheck(l,i);switch(d[0]){case"out":this.errorMessage=r.lengthBadStart+i+r.lengthBadEnd,s=!1;break;case"min":this.errorMessage=r.lengthTooShortStart+d[1]+r.lengthBadEnd,s=!1;break;case"max":this.errorMessage=r.lengthTooLongStart+d[1]+r.lengthBadEnd,s=!1;break;default:s=!0}return s},errorMessage:"",errorMessageKey:""}),e.formUtils.addValidator({name:"url",validatorFunction:function(t){var a=/^(https?|ftp):\/\/((((\w|-|\.|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])(\w|-|\.|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])(\w|-|\.|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/(((\w|-|\.|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/((\w|-|\.|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|\[|\]|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(\#(((\w|-|\.|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i;if(a.test(t)){var n=t.split("://")[1],r=n.indexOf("/");return r>-1&&(n=n.substr(0,r)),e.formUtils.validators.validate_domain.validatorFunction(n)}return!1},errorMessage:"",errorMessageKey:"badUrl"}),e.formUtils.addValidator({name:"number",validatorFunction:function(e,t,a){if(""!==e){var n,r,i=t.valAttr("allowing")||"",o=t.valAttr("decimal-separator")||a.decimalSeparator,s=!1,l=t.valAttr("step")||"",d=!1;if(-1==i.indexOf("number")&&(i+=",number"),-1==i.indexOf("negative")&&0===e.indexOf("-"))return!1;if(i.indexOf("range")>-1&&(n=parseFloat(i.substring(i.indexOf("[")+1,i.indexOf(";"))),r=parseFloat(i.substring(i.indexOf(";")+1,i.indexOf("]"))),s=!0),""!=l&&(d=!0),","==o){if(e.indexOf(".")>-1)return!1;e=e.replace(",",".")}if(i.indexOf("number")>-1&&""===e.replace(/[0-9-]/g,"")&&(!s||e>=n&&r>=e)&&(!d||e%l==0))return!0;if(i.indexOf("float")>-1&&null!==e.match(new RegExp("^([0-9-]+)\\.([0-9]+)$"))&&(!s||e>=n&&r>=e)&&(!d||e%l==0))return!0}return!1},errorMessage:"",errorMessageKey:"badInt"}),e.formUtils.addValidator({name:"alphanumeric",validatorFunction:function(t,a,n,r){var i="^([a-zA-Z0-9",o="]+)$",s=a.valAttr("allowing"),l="";if(s){l=i+s+o;var d=s.replace(/\\/g,"");d.indexOf(" ")>-1&&(d=d.replace(" ",""),d+=r.andSpaces||e.formUtils.LANG.andSpaces),this.errorMessage=r.badAlphaNumeric+r.badAlphaNumericExtra+d}else l=i+o,this.errorMessage=r.badAlphaNumeric;return new RegExp(l).test(t)},errorMessage:"",errorMessageKey:""}),e.formUtils.addValidator({name:"custom",validatorFunction:function(e,t){var a=new RegExp(t.valAttr("regexp"));return a.test(e)},errorMessage:"",errorMessageKey:"badCustomVal"}),e.formUtils.addValidator({name:"date",validatorFunction:function(t,a,n){var r=a.valAttr("format")||n.dateFormat||"yyyy-mm-dd";return e.formUtils.parseDate(t,r)!==!1},errorMessage:"",errorMessageKey:"badDate"}),e.formUtils.addValidator({name:"checkbox_group",validatorFunction:function(t,a,n,r,i){var o=!0,s=a.attr("name"),l=e("input[type=checkbox][name^='"+s+"']",i),d=l.filter(":checked").length,u=a.valAttr("qty");if(void 0==u){var c=a.get(0).nodeName;alert('Attribute "data-validation-qty" is missing from '+c+" named "+a.attr("name"))}var g=e.formUtils.numericRangeCheck(d,u);switch(g[0]){case"out":this.errorMessage=r.groupCheckedRangeStart+u+r.groupCheckedEnd,o=!1;break;case"min":this.errorMessage=r.groupCheckedTooFewStart+g[1]+r.groupCheckedEnd,o=!1;break;case"max":this.errorMessage=r.groupCheckedTooManyStart+g[1]+r.groupCheckedEnd,o=!1;break;default:o=!0}if(!o){var f=function(){l.unbind("click",f),l.filter("*[data-validation]").validateInputOnBlur(r,n,!1,"blur")};l.bind("click",f)}return o}})}(jQuery);
//# sourceMappingURL=scripts.js.map