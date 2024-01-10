<template>
  <div>
    <h1>bob</h1>
    <div class="charts">
        <apexchart
          width="500"
          type="bar"
          :options="options"
          :series="series"
        ></apexchart>
        <apexchart
          width="500"
          type="bar"
          :options="options"
          :series="series"
        ></apexchart>
    </div>
  </div>
</template>

<script>
export default {
  name: "Admin",
  data: function () {
    return {
      options: {
        chart: {
          id: "vuechart-example",
        },
        xaxis: {
          categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998],
        },
      },
      series: [
        {
          name: "series-1",
          data: [30, 40, 45, 50, 49, 60, 70, 91],
        },
      ],
    };
  },
};
</script>

<style>
.charts {
  display: flex;
  flex-direction: row;
  justify-content: space-around;
  flex-wrap: wrap;
}
</style>
