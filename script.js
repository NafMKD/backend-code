// for number formatin like 4.5K
function nFormatter(num, digits) {
  const lookup = [
    { value: 1, symbol: "" },
    { value: 1e3, symbol: "k" },
    { value: 1e6, symbol: "M" },
    { value: 1e9, symbol: "G" },
    { value: 1e12, symbol: "T" },
    { value: 1e15, symbol: "P" },
    { value: 1e18, symbol: "E" }
  ];
  const rx = /\.0+$|(\.[0-9]*[1-9])0+$/;
  var item = lookup.slice().reverse().find(function(item) {
    return num >= item.value;
  });
  return item ? (num / item.value).toFixed(digits).replace(rx, "$1") + item.symbol : "0";
}

document.addEventListener("DOMContentLoaded", () => {
	// Total Vs Meaningfull Calls
  $.get("requests.php?file=calls&target=all", function (data) {
    var alldata = data.data;
		$('#totalCall').html(data.count);
    $.get("requests.php?file=calls&target=meaning", function (mdata) {
      var meaningdata = mdata.data;
			$('#MeaningCall').html(mdata.count);
      echarts.init(document.querySelector("#lineChart")).setOption({
        tooltip: {
          trigger: "item",
        },
        xAxis: {
          type: "category",
          data: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
        },
        yAxis: {
          type: "value",
        },
        series: [
          {
            name: "Totla call",
            data: [
              alldata.Mon ? alldata.Mon : 0,
              alldata.Tue ? alldata.Tue : 0,
              alldata.Wed ? alldata.Wed : 0,
              alldata.Thu ? alldata.Thu : 0,
              alldata.Fri ? alldata.Fri : 0,
              alldata.Sat ? alldata.Sat : 0,
              alldata.Sun ? alldata.Sun : 0,
            ],
            type: "line",
            smooth: true,
          },
          {
            name: "Meaningfull call",
            data: [
              meaningdata.Mon ? meaningdata.Mon : 0,
              meaningdata.Tue ? meaningdata.Tue : 0,
              meaningdata.Wed ? meaningdata.Wed : 0,
              meaningdata.Thu ? meaningdata.Thu : 0,
              meaningdata.Fri ? meaningdata.Fri : 0,
              meaningdata.Sat ? meaningdata.Sat : 0,
              meaningdata.Sun ? meaningdata.Sun : 0,
            ],
            type: "line",
            smooth: true,
          },
        ],
      });
    });
  });
	// Quotation Used by Sales Agent
	$.get("requests.php?file=quotaions&target=agent", function (data) {
		$('#quoIssue').html(data.count);
		var viewdata = [];
		for(let i=1;i<=Object.keys(data.data).length;i++){
			viewdata[i-1] =  data.data[i];
		}
		echarts.init(document.querySelector("#donutChart")).setOption({
			tooltip: {
				trigger: "item",
			},
			series: [
				{
					name: "Quotation Used",
					type: "pie",
					radius: ["40%", "70%"],
					avoidLabelOverlap: false,
					label: {
						show: false,
						position: "center",
					},
					emphasis: {
						label: {
							show: true,
							fontSize: "18",
							fontWeight: "bold",
						},
					},
					labelLine: {
						show: false,
					},
					data: viewdata
				},
			],
		});
	});
	// Quotation Value by Sales Agent
	$.get("requests.php?file=quotaions&target=value", function (data) {
		var viewdata2 = [];
		var daluedata = 0;
		for(let i=1;i<=Object.keys(data.data).length;i++){
			viewdata2[i-1] =  data.data[i];
			daluedata += data.data[i].value;
		}
		$('#quoValue').html('$'+nFormatter(daluedata,2));
		echarts.init(document.querySelector("#pieChart")).setOption({
			tooltip: {
				trigger: 'item'
			},
			series: [{
				name: 'Quotation Value',
				type: 'pie',
				radius: '50%',
				data: viewdata2,
				emphasis: {
					itemStyle: {
						shadowBlur: 10,
						shadowOffsetX: 0,
						shadowColor: 'rgba(0, 0, 0, 0.5)'
					}
				}
			}]
		});
	});
	// Bussiness Closed
	$.get("requests.php?file=quotaions&target=status",function(data){
		$('#buisness').html(data.data);
	});
});

