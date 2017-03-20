/**
 * Created by HP Pavilion 17 on 20.3.2017 г..
 */

var mediator = new XMLHttpRequest();

mediator.open('DELETE', 'http://localhost/PHP2/Project-short/remove/php?id=' + id, true);
mediator.send(null);