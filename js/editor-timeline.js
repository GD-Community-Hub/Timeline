$.ajax({
    url: 'http://gdtimeline.wz.cz/editor-data.json',
    success: function (data) {
      document.getElementById('loading').style.display = 'none';
      var container = document.getElementById('visualization');
  
      var items = new timeline.DataSet(data);
  
      var options = {
        width: '90%',
        height: '70vh',
        align: 'center',
        min: '1/1/2013',
        editable: true,
        locale: 'en',
      }

      var timeline = new timeline.Timeline(container, items, options);

  },
      error: function (err) {
      console.log('Error', err);
      if (err.status === 0) {
        alert('Failed to load editor-data.json.\nPlease run this on a server.');
      }
      else {
        alert('Failed to load editor-data.json.');
      }
    }
  });