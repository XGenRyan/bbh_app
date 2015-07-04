getPlayers(function(data) {
    var players = JSON.parse(data);

    var viewModel = function() {
      var self = this;

      self.players = ko.observableArray(players);
        
      self.headers = [
        {title:'Username', sortPropertyName:'username', asc: false, active: true},
        {title:'Kills', sortPropertyName:'kills', asc: false, active: false},
        {title:'Deaths', sortPropertyName:'deaths', asc: false, active: false},
        {title:'Bounty Points', sortPropertyName:'bountyPoints', asc: false, active: false}
      ];
        
      self.activeSort = ko.observable(function(){return 0;});
      self.sort = function(header, event) {
        if (header.active) {
          header.asc = !header.asc;
        }
        ko.utils.arrayForEach(self.headers, function(item){ item.active = false; } );
        header.active = true;

        var prop = header.sortPropertyName;
        var ascSort = function(a,b){ return a[prop] < b[prop] ? -1 : a[prop] > b[prop] ? 1 : a[prop] == b[prop] ? 0 : 0; };
        var descSort = function(a,b){ return a[prop] > b[prop] ? -1 : a[prop] < b[prop] ? 1 : a[prop] == b[prop] ? 0 : 0; };
        var sortFunc = header.asc ? ascSort : descSort;

        self.activeSort(sortFunc);
      };
        
      self.players = ko.computed(function() {
        var result = self.players();
        return result.sort(self.activeSort());
      });
    }

    ko.applyBindings(new viewModel());
});

function getPlayers(cb) {
  $.get("?controller=players&action=index", function(data) {
    // data = data.replace(/<(?:.|\n)*?>/gm, '').trim();
    data = data.match("\\[.*]")[0];
    cb(data);
  });
}