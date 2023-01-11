$.ajax({
  url: '/main-data.json',
  success: function (data) {
    document.getElementById('loading').style.display = 'none';
    var container = document.getElementById('visualization');

    var items = new vis.DataSet(data);

    var groups = [
      {
        id: 1,
        content: 'Updates, Game Stuff'
      },
      {
        id: 2,
        content: 'Levels'
      },
      {
        id: 3,
        content: 'Community Events'
      }
    ];

    const date = new Date();
    let currentYear = date.getFullYear();
    let maxYear = currentYear + 1;
    let maxTime = '1/1/';

    var options = {
      width: '90%',
      height: '80vh',
      align: 'center',
      min: '1/1/2013',
      max: '1/1/2024',
      locale: 'en',
      preferZoom: true,
      zoomMin: 100 * 60 * 24
    };

    var timeline = new vis.Timeline(container, items, options);
  },
  error: function (err) {
    console.log('Error', err);
    if (err.status === 0) {
      alert('Failed to load data.json.\nPlease run this example on a server.');
    }
    else {
      alert('Failed to load data.json.');
    }
  }
});