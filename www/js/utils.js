'use strict';

/**
 * @param Date begin
 * @param Date end
 * @return struct[] {title:string,date:Date}
 */
function getSessionPeriodes(begin, end) {
    begin = new Date(begin);
    var names = [];
    names[0] = "Jan";
    names[1] = "Fev";
    names[2] = "Mar";
    names[3] = "Avr";
    names[4] = "Mai";
    names[5] = "Jun";
    names[6] = "Jui";
    names[7] = "Aou";
    names[8] = "Sep";
    names[9] = "Oct";
    names[10] = "Nov";
    names[11] = "Dec";
    var periodes = {};
    while (begin < end) {
      periodes[names[begin.getMonth()] + "-" + begin.getFullYear()] = begin;
      begin = new Date(begin.setMonth(begin.getMonth() + 1));
    }
    return periodes;
}