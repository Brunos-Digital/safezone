function appHeight(){document.documentElement.style.setProperty("--app-height",window.innerHeight+"px"),document.documentElement.style.setProperty("--app-width",window.innerWidth+"px")}window.addEventListener("resize",appHeight),appHeight(),$(document).ready(function(){function e(e){const t=e.closest(".table");e=0<t.find("input[data-table-checkbox]:checked").length;t.find(".table-actions").toggleClass("active",e)}$("input[data-table-checkbox]").each(function(){e($(this))}),$("input[data-table-checkbox]").on("change",function(){e($(this))})}),$(".table-dropdown__toggle").each(function(){new bootstrap.Dropdown($(this),{popperConfig:{strategy:"fixed"}})}),$(document).on("click","[data-license-banner-close]",function(){$(".license-banner").addClass("hide")}),$(document).ready(function(){if(0<$(".home__chart-container").length){const t=echarts.init(document.querySelector(".home__chart-container"));var e={title:{text:"Malware Blocking Statistics",padding:[14,24],textStyle:{fontSize:16,fontWeight:480,lineHeight:22}},tooltip:{trigger:"axis",axisPointer:{type:"cross",label:{backgroundColor:"#6a7985"}},formatter:function(e){const t=e.map(e=>`
        <div style="
            display:flex;
            align-items: center;
            gap: 8px;
        ">
            <div style="height: 8px; width: 8px; border-radius: 50%; background-color: ${e.color}"></div>
            <div style="
              color: #8C8F94;
              font-size: 14px;
              font-weight: 440;
              line-height: 20px;
              letter-spacing: -0.32px;
            ">${e.seriesName}</div>
            <div style="
              color: #101517;
              font-size: 14px;
              font-weight: 600;
              line-height: 20px;
              margin-left: auto;
            ">${e.value}</div>
        </div>
    `);return`
        <div style="
          border-radius: 10px;
          border: 1px solid #F0F0F1;
          background: #FFF;
          box-shadow: 0 1px 2px 0 rgba(16, 24, 40, 0.05);
          display: inline-flex;
          padding: 19px;
          flex-direction: column;
          gap: 16px;
          margin: -30px;
          min-width: 236px;
        ">
          <div style="
            color: #101517;
            font-size: 14px;
            font-weight: 600;
            line-height: 20px;
            letter-spacing: -0.32px;
          ">
              ${e[0].axisValue}
          </div>
          <div style="
            display:flex;
            flex-direction: column;
            gap: 10px;
          ">
              ${t.join("")}
          </div>
        </div>
    `}},legend:{data:["Malicious Activities","Spam Activities","Firewall Detections"],icon:"circle",right:24,top:14,textStyle:{color:"#8C8F94",fontSize:14,fontWeight:400},itemWidth:8,itemHeight:8,itemGap:24},grid:{top:"86px",left:"24px",right:"24px",bottom:"24px",containLabel:!0},xAxis:[{type:"category",boundaryGap:!1,data:["Mon","Tue","Wed","Thu","Fri","Sat","Sun"],axisLabel:{align:"center",margin:14,textStyle:{color:"#8C8F94",fontSize:12}},axisTick:{length:0},axisLine:{show:!1}}],yAxis:[{type:"value",max:300,axisLabel:{textStyle:{color:"#8C8F94",fontSize:12}},splitLine:{lineStyle:{color:"#F2F4F7"}}}],series:[{name:"Firewall Detections",type:"line",emphasis:{focus:"series"},symbolSize:0,symbol:"circle",itemStyle:{color:"#4F94D4"},data:[50,56,54,50,50,70,54].map((e,t,i)=>({value:e,symbolSize:e===Math.max(...i)?12:void 0})),lineStyle:{color:"rgb(79,148,212)"},areaStyle:{color:new echarts.graphic.LinearGradient(0,0,0,1,[{offset:0,color:"rgba(79,148,212,0.10)"},{offset:1,color:"rgba(255, 255, 255, 0.00)"}])}},{name:"Spam Activities",type:"line",emphasis:{focus:"series"},symbolSize:0,symbol:"circle",itemStyle:{color:"#F6A306"},data:[120,126,124,120,140,110,124].map((e,t,i)=>({value:e,symbolSize:e===Math.max(...i)?12:void 0})),lineStyle:{color:"#F6A306"},areaStyle:{color:new echarts.graphic.LinearGradient(0,0,0,1,[{offset:0,color:"rgba(246, 163, 6, 0.10)"},{offset:1,color:"rgba(255, 255, 255, 0.00)"}])}},{name:"Malicious Activities",type:"line",emphasis:{focus:"series"},symbolSize:0,symbol:"circle",itemStyle:{color:"#FB5607"},data:[193,194,240,200,180,190,197].map((e,t,i)=>({value:e,symbolSize:e===Math.max(...i)?12:void 0})),lineStyle:{color:"#FB5607"},areaStyle:{color:new echarts.graphic.LinearGradient(0,0,0,1,[{offset:0,color:"rgba(251, 86, 7, 0.10)"},{offset:1,color:"rgba(255, 255, 255, 0.00)"}])}}]};t.setOption(e)}});