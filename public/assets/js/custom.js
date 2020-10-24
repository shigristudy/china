var collectedLanguages = new Array();

$(document).ready(function () {
    // populateLanguages();


    $("#sourceLanguage").select2({
        placeholder: "Select language",
        allowClear: true
    });

    $("#targetLanguage").select2({
        placeholder: "Select language",
        allowClear: true
    });

    $("#targetSubject").select2({
        placeholder: "Select subject",
        allowClear: true
    });
    $("#voiceNumber").select2({
        placeholder: "Select number of voice",
        allowClear: true
    });
    $("#audioSampleSubject").select2({
        placeholder: "Select voice sample",
        allowClear: true
    });
    $("#deliveryTime").select2({
        placeholder: "Select delivery time",
        allowClear: true
    });

    //Set radio checked and unchecked
    $('#rdoAuto').prop("checked", true);
    $('#divAuto').prop("class", "trans-radio selected");
    $('#dateSel').children().prop("disabled", true);

    //Fill date drop down
    var d = new Date();
    var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    var days = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];

    Date.prototype.addDays = function (days) {
        var date = new Date(this.valueOf());
        date.setDate(date.getDate() + days);
        return date;
    }

    var customDates = new Array();
    var i = 0;
    while (1 == 1) {
        if (i <= 30) {
            if (days[d.getDay()] != "Sat" && days[d.getDay()] != "Sun") {
                customDates[i] = days[d.getDay()]+ " " + prefixZero(d.getDate().toString()) + " " + months[d.getMonth()];
                d = d.addDays(1);
                i++;
            }
            else {
                d = d.addDays(1);
            }
        }
        else if (i > 30) {
            break;
        }
    }

    $.each(customDates, function (i, item) {
        $('#selDate').append($('<option>', {
            value: item,
            text: item
        }));
    });

    //Populate time drop down
    var time = ["09:00 AM", "11:00 AM", "01:00 PM", "03:00 PM", "05:00 PM", "07:00 PM", "09:00 PM"];
    $.each(time, function (i, item) {
        $('#selTime').append($('<option>', {
            value: item,
            text: item
        }));
    });

    $('#rdoDate').click(function () {
        $('#dateSel').children().prop("disabled", false);
        $('#divDelivery').prop("class", "trans-radio selected");
        $('#divAuto').prop("class", "trans-radio");
    });

    $('#rdoAuto').click(function () {
        $('#dateSel').children().prop("disabled", true);
        $('#divDelivery').prop("class", "trans-radio");
        $('#divAuto').prop("class", "trans-radio selected");
    });

    $('#btnDone').click(function () {
        if ($('#rdoAuto').is(':checked'))
        {
            $('#btnBestPrice').prop('value', "Auto (best price)");
        }
        else
        {
            $('#btnBestPrice').prop('value', $('#selDate').val() + ' ' + $('#selTime').val() + ' ' + $('#selZone').val());
        }
    });

    // document.getElementById("demo").innerHTML = days[d.getDay()] + " " + d.getDate() + " " + months[d.getMonth()];

    // $('#btnReset').click(function () {
    //     resetAll();
    // });
});

// function resetAll()
// {
//     collectedLanguages = [];
//
//     $('#ulLanguages1 li').each(function () {
//         $(this).removeClass("active");
//     });
//
//     $('#ulLanguages2 li').each(function () {
//         $(this).removeClass("active");
//     });
//
//     $('#ulLanguages3 li').each(function () {
//         $(this).removeClass("active");
//     });
//
//     $('#ulLanguages4 li').each(function () {
//         $(this).removeClass("active");
//     });
//
//     $('#targetLanguage').text("");
//     addLanguagesOptions().then(item => $('#targetLanguage').append(item));
//
//     // $('#languageCount').text("0 LANGUAGES SELECTED");
//
//     $('#aMultiple').text("Add multiple languages.");
//
//     $('#targetLanguage').prop("disabled", false);
// }

// function collectLanguages(obj)
// {
//     var objVal = replaceChars($(obj).text());
//     if ($.inArray($(obj).text(), collectedLanguages) > -1)
//     {
//         Array.prototype.remove = function () {
//             var what, a = arguments, L = a.length, ax;
//             while (L && this.length) {
//                 what = a[--L];
//                 while ((ax = this.indexOf(what)) !== -1) {
//                     this.splice(ax, 1);
//                 }
//             }
//             return this;
//         };
//
//         collectedLanguages.remove($(obj).text());
//
//         if(collectedLanguages.length > 0)
//         {
//             $('#' + objVal).removeClass("active");
//             setTargetLanguageSelect($(obj).text(), "remove");
//             setCount();
//         }
//         else
//         {
//             resetAll();
//         }
//     }
//     else
//     {
//         $('#' + objVal).addClass("active");
//         setTargetLanguageSelect($(obj).text(), "add");
//         setCount();
//     }
//     return false;
// }

// function setTargetLanguageSelect(str, action)
// {
//
//
//     $('#targetLanguage').text("");
//
//     if (action == "add")
//     {
//         collectedLanguages.push(str);
//     }
//
//     optionText = collectedLanguages.join(",");
//     optionValue = collectedLanguages.join(",");
//
//     $('#targetLanguage').append(`<option value="${optionValue}">
//                                        ${optionText}
//                                   </option>`);
// }

// function setCount()
// {
//     $('#languageCount').text(collectedLanguages.length.toString() + " LANGUAGES SELECTED");
//     $('#aMultiple').text(collectedLanguages.length.toString() + " languages selected.");
//     $('#targetLanguage').prop("disabled", true);
// }

let addLanguagesOptions = () =>
{
    return new Promise(resolve => {
        var languageOptions = '';
        $.ajax({
            url: 'https://aivox.de/get_lang',
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                console.log("reset all", response);
                response.data.forEach(function (item) {
                    languageOptions += "<option value=" + item.id + ">" + item.lang + "</option>"
                });
                console.log(languageOptions);
                resolve(languageOptions);
            },
            error: function (error) {
                console.log(error)
            }
        });
    })
}

function prefixZero(str) {
    if (str.length == 1) {
        return "0" + str;
    }
    else {
        return str;
    }
}

function filter(element) {
    var value = $(element).val();

    $("#ulLanguages1 > li").each(function () {
        if ($(this).text().toLowerCase().search(value.toLowerCase()) > -1) {
            $(this).show();
        }
        else {
            $(this).hide();
        }
    });

    $("#ulLanguages2 > li").each(function () {
        if ($(this).text().toLowerCase().search(value.toLowerCase()) > -1) {
            $(this).show();
        }
        else {
            $(this).hide();
        }
    });

    $("#ulLanguages3 > li").each(function () {
        if ($(this).text().toLowerCase().search(value.toLowerCase()) > -1) {
            $(this).show();
        }
        else {
            $(this).hide();
        }
    });

    $("#ulLanguages4 > li").each(function () {
        if ($(this).text().toLowerCase().search(value.toLowerCase()) > -1) {
            $(this).show();
        }
        else {
            $(this).hide();
        }
    });
}

// function populateLanguages()
// {
//     $.ajax({
//         url: 'http://127.0.0.1:8000/get_lang',
//         method: 'GET',
//         dataType: 'json',
//         success: function (response) {
//             var lang_list = [];
//             if (response.data) {
//                 response.data.forEach(function (item) {
//                     var temp = item.id + '#' + item.lang;
//                     lang_list.push(temp);
//
//                 });
//                 makeLangList(lang_list);
//             }
//         },
//         error: function (error) {
//             console.log(error)
//         }
//     });
//
// }

// function makeLangList(lang_list) {
//     var languageMasterList = lang_list;
//     var languageMasterText = [];
//     var languageMasterValue = [];
//
//     $.each(languageMasterList, function (i, item) {
//         languageMasterText.push(item.toString().split("#")[1]);
//     });
//
//     languageMasterText = languageMasterText.sort();
//
//     var languageList1 = [];
//     var languageList2 = [];
//     var languageList3 = [];
//     var languageList4 = [];
//     //var i = 1;
//     $.each(languageMasterText, function (i, item) {
//         if (i <= 20)
//         {
//             languageList1.push(item.toString());
//         }
//         else if (i > 20 && i <= 41)
//         {
//             languageList2.push(item.toString());
//         }
//         else if (i > 42 && i <= 63)
//         {
//             languageList3.push(item.toString());
//         }
//         else if (i > 63) {
//             languageList4.push(item.toString());
//         }
//     });
//     $.each(languageList1, function (i, item) {
//         $("#ulLanguages1").append('<li id=' + replaceChars(item) + '><a href="" onclick="return collectLanguages(this);">' + item + '</a><div class="multi-column-tick"><svg width="18px" height="13px" viewBox="0 0 18 13"><g stroke="none" stroke-width="1" class="icon__fill" fill-rule="evenodd"><g transform="translate(-3.000000, -5.000000)" fill-rule="nonzero"><path d="M19.2928932,5.29289322 C19.6834175,4.90236893 20.3165825,4.90236893 20.7071068,5.29289322 C21.0976311,5.68341751 21.0976311,6.31658249 20.7071068,6.70710678 L9.70710678,17.7071068 C9.31658249,18.0976311 8.68341751,18.0976311 8.29289322,17.7071068 L3.29289322,12.7071068 C2.90236893,12.3165825 2.90236893,11.6834175 3.29289322,11.2928932 C3.68341751,10.9023689 4.31658249,10.9023689 4.70710678,11.2928932 L9,15.5857864 L19.2928932,5.29289322 Z"></path></g></g></svg></div></li>');
//     });
//
//     $.each(languageList2, function (i, item) {
//         $("#ulLanguages2").append('<li id=' + replaceChars(item) + '><a href="" onclick="return collectLanguages(this);">' + item + '</a><div class="multi-column-tick"><svg width="18px" height="13px" viewBox="0 0 18 13"><g stroke="none" stroke-width="1" class="icon__fill" fill-rule="evenodd"><g transform="translate(-3.000000, -5.000000)" fill-rule="nonzero"><path d="M19.2928932,5.29289322 C19.6834175,4.90236893 20.3165825,4.90236893 20.7071068,5.29289322 C21.0976311,5.68341751 21.0976311,6.31658249 20.7071068,6.70710678 L9.70710678,17.7071068 C9.31658249,18.0976311 8.68341751,18.0976311 8.29289322,17.7071068 L3.29289322,12.7071068 C2.90236893,12.3165825 2.90236893,11.6834175 3.29289322,11.2928932 C3.68341751,10.9023689 4.31658249,10.9023689 4.70710678,11.2928932 L9,15.5857864 L19.2928932,5.29289322 Z"></path></g></g></svg></div></li>');
//     });
//
//     $.each(languageList3, function (i, item) {
//         $("#ulLanguages3").append('<li id=' + replaceChars(item) + '><a href="" onclick="return collectLanguages(this);">' + item + '</a><div class="multi-column-tick"><svg width="18px" height="13px" viewBox="0 0 18 13"><g stroke="none" stroke-width="1" class="icon__fill" fill-rule="evenodd"><g transform="translate(-3.000000, -5.000000)" fill-rule="nonzero"><path d="M19.2928932,5.29289322 C19.6834175,4.90236893 20.3165825,4.90236893 20.7071068,5.29289322 C21.0976311,5.68341751 21.0976311,6.31658249 20.7071068,6.70710678 L9.70710678,17.7071068 C9.31658249,18.0976311 8.68341751,18.0976311 8.29289322,17.7071068 L3.29289322,12.7071068 C2.90236893,12.3165825 2.90236893,11.6834175 3.29289322,11.2928932 C3.68341751,10.9023689 4.31658249,10.9023689 4.70710678,11.2928932 L9,15.5857864 L19.2928932,5.29289322 Z"></path></g></g></svg></div></li>');
//     });
//
//     $.each(languageList4, function (i, item) {
//         $("#ulLanguages4").append('<li id=' + replaceChars(item) + '><a href="" onclick="return collectLanguages(this);">' + item + '</a><div class="multi-column-tick"><svg width="18px" height="13px" viewBox="0 0 18 13"><g stroke="none" stroke-width="1" class="icon__fill" fill-rule="evenodd"><g transform="translate(-3.000000, -5.000000)" fill-rule="nonzero"><path d="M19.2928932,5.29289322 C19.6834175,4.90236893 20.3165825,4.90236893 20.7071068,5.29289322 C21.0976311,5.68341751 21.0976311,6.31658249 20.7071068,6.70710678 L9.70710678,17.7071068 C9.31658249,18.0976311 8.68341751,18.0976311 8.29289322,17.7071068 L3.29289322,12.7071068 C2.90236893,12.3165825 2.90236893,11.6834175 3.29289322,11.2928932 C3.68341751,10.9023689 4.31658249,10.9023689 4.70710678,11.2928932 L9,15.5857864 L19.2928932,5.29289322 Z"></path></g></g></svg></div></li>');
//     });
// }
function replaceChars(item)
{
    while (item.indexOf("(") >= 0)
    {
        item = item.replace("(", "");
    }

    while (item.indexOf(")") >= 0) {
        item = item.replace(")", "");
    }

    while (item.indexOf("/") >= 0) {
        item = item.replace("/", "");
    }

    while (item.indexOf(",") >= 0) {
        item = item.replace(",", "");
    }

    while (item.indexOf(" ") >= 0) {
        item = item.replace(" ", "");
    }

    return item;
}