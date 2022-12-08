function Notification(htmlElement) {
    
    this.htmlElement = htmlElement;
    this.icon = htmlElement.querySelector('.icon > i');
    this.text = htmlElement.querySelector('.text');
    this.close = htmlElement.querySelector('.close');
    this.isRunning = false;
    this.timeout;
    
    this.bindEvents();
};

Notification.prototype.bindEvents = function() {
	var self = this;
    this.close.addEventListener('click', function() {
        window.clearTimeout(self.timeout);
        self.reset();
    });
}

Notification.prototype.info = function(message) {
    if(this.isRunning) return false;
    
    this.text.innerHTML = message;
	this.htmlElement.className = 'notification info';
    this.icon.className = 'fa fa-2x fa-info-circle';
    
    this.show();
}

Notification.prototype.show = function() {
    if(!this.htmlElement.classList.contains('visible'))
        this.htmlElement.classList.add('visible');
    
    this.isRunning = true;
    this.autoReset();
};
    
Notification.prototype.autoReset = function() {
	var self = this;
    this.timeout = window.setTimeout(function() {
        self.reset();
    }, 10000);
}

Notification.prototype.reset = function() {
	this.htmlElement.className = "notification";
    this.icon.className = "";
    this.isRunning = false;
};

document.addEventListener('DOMContentLoaded', init);

function init() {
	var info = document.getElementById('info');
    
    var notificator = new Notification(document.querySelector('.notification'));
    
    info.onload = function() {
        
     	notificator.info('Tienes traspasos pendientes, debes de recibirlos pronto.');   
    }
}