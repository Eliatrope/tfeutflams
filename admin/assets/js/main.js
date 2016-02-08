//View http://bichotll.github.io/bic_calendar/ for more details and doc

$(document).ready(function() {

    var monthNames = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];

    var dayNames = ["Lu", "Ma", "Me", "Je", "Ve", "Sa", "Di"];

    var events = [
        {
            date: "28/12/2013",
            title: 'SPORT & WELLNESS',
            link: 'http://bic.cat',
            linkTarget: '_blank',
            color: '',
            content: '<img src="http://gettingcontacts.com/upload/jornadas/sport-wellness_portada.png" /><br />06-11-2013 - 09:00 <br /> Tecnocampus Mataró Auditori',
            class: '',
            displayMonthController: true,
            displayYearController: true,
            nMonths: 6
        },{
			//Penser à virer les 0...
			date: "8/2/2016",
            title: 'Test flam\'s',
            link: '',
            linkTarget: '_blank',
            color: '',
            content: 'Petite flam\'s',
            class: '',
            displayMonthController: true,
            displayYearController: true,
            nMonths: 6
		}
    ];

    $('#events-calendar').bic_calendar({
        //list of events in array
        events: events,
        //enable select
        enableSelect: false,
        //enable multi-select
        multiSelect: false,
        //set day names
        dayNames: dayNames,
        //set month names
        monthNames: monthNames,
        //show dayNames
        showDays: true,
        //show month controller
        displayMonthController: true,
        //show year controller
        displayYearController: true,
    });
});