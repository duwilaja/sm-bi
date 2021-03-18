/* echart (#echartArea3) open */
var areaData3 = [
    {
      name: 'Profit',
      type: 'bar',
      smooth: true,
      data: [0,120, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4],
	  symbolSize:20,
	  barWidth: 20,
	    itemStyle: {
			normal: { barBorderRadius: [50 ,50, 0 ,0],
					color: new echarts.graphic.LinearGradient(
                        0, 0, 0, 1,
                        [
                            {offset: 0, color: '#2575fc'},
                            {offset: 1, color: '#4a32d4'}
                        ]
                    )
			}
		},
    },
	{
      name: 'Profit',
      type: 'line',
      smooth: true,
      data: [null, 120, 80, 100, 130, 140,130,150],
	  symbolSize:5,
	    itemStyle: {
			normal: { barBorderRadius: [50 ,50, 0 ,0],
					color: new echarts.graphic.LinearGradient(
                        0, 0, 0, 1,
                        [
                            {offset: 0, color: '#fd6f82'},
                            {offset: 1, color: '#fb1c52'}
                        ]
                    )
			}
		},
    },
    
  ];

  var optionArea3 = {
    grid: {
      top: '6',
      right: '25',
      bottom: '17',
      left: '25',
    },
    xAxis: {
      data: ['0','Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat','Sabtu','Minggu' ],
      boundaryGap: false,
      axisLine: {
        lineStyle: { color: 'rgba(142, 156, 173, 0.2)' }
      },
      axisLabel: {
        fontSize: 10,
        color: '#8e9cad ',
		display:'false'
      }
    },
	tooltip: {
		show: true,
		showContent: true,
		alwaysShowContent: true,
		triggerOn: 'mousemove',
		trigger: 'axis',
		axisPointer:
			{
				label: {
					show: false,
				}
			}

	},
    yAxis: {
      splitLine: {
        lineStyle: { color: 'rgba(142, 156, 173, 0.2)' },
		display:false
      },
      axisLine: {
        lineStyle: { color: 'rgba(142, 156, 173, 0.2)' },
		display:false
      },
      axisLabel: {
        fontSize: 10,
        color: '#8e9cad '
      }
    },
    series: areaData3,
    color:[ '#32cafe']
  };
	
  var chartArea3 = document.getElementById('echartArea3');
  var areaChart3 = echarts.init(chartArea3);
  areaChart3.setOption(optionArea3);
  /* echart (#echartArea3) closed */