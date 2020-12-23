function s(pNumber) {
    return (pNumber == 1) ? "" : "s";
}

function units(pNumber, pUnit) {
    var number;
    if (ko.isObservable(pNumber)) {
        number = pNumber();
    } else {
        number = pNumber;
    }

    return number + " " + pUnit + s(number);
}

var Model = {};

$(function () {
    Model.orientation = ko.observable("landscape");
    Model.startMonth = ko.observable("1");
    Model.paperSize = ko.observable("letter");
    Model.calendarType = ko.observable("single");
    Model.shadeWeekendColumns = ko.observable("False");
    Model.showGridLines = ko.observable("True");
    Model.includeNotes = ko.observable("False");
    Model.weekdayStartsWith = ko.observable("Sunday");
    Model.gridLineColor = ko.observable("Gray");
    Model.daySize = ko.observable("Small");


    Model.calendarType.subscribe(function(newValue) {
        if(newValue == "yearly") {
            Model.daySize("Big");
        }
    });

    Model.calendarType.subscribe(function(oldValue) {
        if(oldValue == "yearly") {
            Model.daySize("Small");
        }
    }, Model, "beforeChange");

    Model.showNotesOption = ko.computed(function () {
        return Model.calendarType() == "single" && Model.orientation() == "landscape";
    });

    var now = new Date();
    //var year = now.getFullYear();
    var year = 2020;
    if (now.getMonth() == 11) { // 11 = December
        year++;
    }

    Model.year = ko.observable(year);

    Model.months = [];
    for (var i = 0; i < 12; i++) {
        Model.months[i] = ko.observable(true);
    }

    Model.firstMonth = ko.computed(function () {
        for (var i = 0; i < 12; i++) {
            if (Model.months[i]()) return i;
        }
        return 0;
    });

    Model.monthCount = ko.computed(function () {
        var count = 0;
        for (var i = 0; i < 12; i++) {
            if (Model.months[i]()) count++;
        }
        return count;
    });

    Model.toggleMonth = function (i) {
        var value = Model.months[i]();
        Model.months[i](!value);
    };

    var paperSizes = [];
    paperSizes["letter"] = { width: 301, height: 389 };
    paperSizes["legal"] = { width: 237, height: 390 };
    paperSizes["11x17"] = { width: 252, height: 390 };
    paperSizes["poster"] = { width: 260, height: 390 };
    paperSizes["movie-poster"] = { width: 234, height: 390 };
    paperSizes["a4"] = { width: 291, height: 390 }; // TODO:

    Model.numberOfPages = ko.computed(function () {
        var calendarType = Model.calendarType();
        if (calendarType == "yearly") return 1;

        var monthCount = Model.monthCount();
        var monthPerPage;

        switch (calendarType) {
            case "single":
                monthPerPage = 1;
                break;
            case "two-month":
                monthPerPage = 2;
                break;
            case "four-month":
                monthPerPage = 1;
                break;
        }

        return Math.ceil(monthCount / monthPerPage);
    });

    Model.imageWidth = ko.computed(function () {

        switch (Model.orientation()) {
            case "portrait":
                return paperSizes[Model.paperSize()].width;
            case "landscape":
                return paperSizes[Model.paperSize()].height;
            default:
                throw "Unknown orientation: " + _orientation;
        }
    });

    Model.imageHeight = ko.computed(function () {
        switch (Model.orientation()) {
            case "portrait":
                return paperSizes[Model.paperSize()].height;
            case "landscape":
                return paperSizes[Model.paperSize()].width;
            default:
                throw "Unknown orientation: " + _orientation;
        }
    });

    Model.imageMarginTop = ko.computed(function () {
        return (410 - Model.imageHeight()) / 2;
    });

    function getCalendarType() {
        var calendarType = Model.calendarType();

        if (calendarType == "two-month") {
            switch (Model.orientation()) {
                case "portrait":
                    calendarType = "two-month-vertical";
                    break;
                case "landscape":
                    calendarType = "two-month-horizontal";
                    break;
                default:
                    throw "Invalid orientation for calendar type two-month: " + Model.orientation();
            }
        }

        return calendarType;
    }

    function getParams() {
        return {
            calendarType: getCalendarType(),
            paperSize: Model.paperSize(),
            orientation: Model.orientation(),
            year: Model.year(),
            month: Model.firstMonth() + 1,
            startMonth: Model.startMonth(),
            shadeWeekendColumns: Model.shadeWeekendColumns(),
            showGridLines: Model.showGridLines(),
            weekdayStartsWith: Model.weekdayStartsWith(),
            includeNotes: Model.includeNotes(),
            gridLineColor: Model.gridLineColor(),
            daySize: Model.daySize()
        };
    }

    Model.print = function () {
        var params = getParams();

        params.print = true;

        var pageUrl = "/Home/DownloadCalendarPdf?" + $.param(params);

        _gaq.push(['_trackPageview', "/Custom" + pageUrl + "&VIRTUAL"]);
        window.open(pageUrl, "_blank");
    };

    Model.download = function () {
        var params = getParams();

        var pageUrl = "/Home/DownloadCalendarPdf?" + $.param(params);

        _gaq.push(['_trackPageview', "/Custom" + pageUrl + "&VIRTUAL"]);
        setTimeout(function () {
            window.open(pageUrl, "_self");
        }, 200);
    };

    Model.imageUrl = ko.computed(function () {
        var params = getParams();
        $.extend(params, { width: Model.imageWidth() });
        return "/Home/CalendarThumbnail?" + $.param(params);
    });

    ko.applyBindings(Model);
});

function makeEventHandlerShortcut(eventName) { // SAMPLE
    ko.bindingHandlers[eventName] = {
        'init': function (element, valueAccessor, allBindingsAccessor, viewModel) {
            var newValueAccessor = function () {
                var result = {};
                result[eventName] = valueAccessor();
                return result;
            };
            return ko.bindingHandlers['event']['init'].call(this, element, newValueAccessor, allBindingsAccessor, viewModel);
        }
    }
}

(function () { // option handler
    var handler = {};
    handler.init = function (element, valueAccessor, allBindingsAccessor, viewModel, bindingContext) {
        var value = valueAccessor();
        var observable = allBindingsAccessor().property;

        $(element).click(function () {
            observable(value);
        });

        if ($(element).html() == "") {
            var displayValue = value.charAt(0).toUpperCase() + value.slice(1); // make first letter upper case
            $(element).html(displayValue);
        }
    };

    handler.update = function (element, valueAccessor, allBindingsAccessor, viewModel, bindingContext) {
        var value = valueAccessor();
        var observable = allBindingsAccessor().property;

        if (observable() == value) {
            $(element).addClass("selected");
        } else {
            $(element).removeClass("selected");
        }
    };

    ko.bindingHandlers.option = handler;
})();