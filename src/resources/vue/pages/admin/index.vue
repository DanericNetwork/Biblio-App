<template>
  <div class="content">
    <AdminLayout />
    <div class="dashboard">
      <span class="dashboard-title">Dashboard</span>
      <div class="info-cards">
        <div class="card">
          <div class="card-body text-center">
            <span class="card-title">Items</span>
            <p class="card-text">4323</p>
          </div>
        </div>
        <div class="card">
          <div class="card-body text-center">
            <span class="card-title">Klanten</span>
            <p class="card-text">120</p>
          </div>
        </div>
        <div class="card">
          <div class="card-body text-center">
            <span class="card-title">Reserveringen</span>
            <p class="card-text">26</p>
          </div>
        </div>
        <div class="card">
          <div class="card-body text-center">
            <span class="card-title">Openstaande Facturen</span>
            <p class="card-text">18</p>
          </div>
        </div>
      </div>
      <div class="charts">
        <apexchart class="chart" width="95%" type="bar" :options="options" :series="series"></apexchart>
        <apexchart class="chart" width="95%" type="bar" :options="options" :series="series"></apexchart>
      </div>
    </div>
  </div>
</template>
<script>
  import AdminLayout from "@/resources/vue/layouts/admin-layout.vue";

  export default {
    name: "AdminDashboard",
    components: {
      AdminLayout,
    },
    data: function () {
      return {
        options: {
          chart: {
            id: "vuechart-example",
            background: "#f2f2f2",
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
<style lang="scss">
  .content {
    display: flex;
    flex-direction: row;
    height: 100%;

    .dashboard {
      display: flex;
      flex-direction: column;
      align-items: start;
      width: 100%;
      padding: 1.3rem;
      background-color: #f2f2f2;

      .dashboard-title {
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 1.3rem;
        color: #191a21;
      }

      .info-cards {
        display: flex;
        flex-direction: row;
        width: 100%;
        justify-content: space-between;
        gap: 1.9rem;
        margin-bottom: 1.3rem;

        .card {
          flex: 1 1;
          background-color: #f2f2f2;
          color: #191a21;

          .card-title {
            font-size: 1.3rem;
            font-weight: bold;
          }
        }
      }

      .charts {
        display: flex;
        flex-direction: row;
        width: 100%;
        gap: 1.9rem;

        .chart {
          padding: 10px;
          border: 1px solid;
          flex: 1 1;
          border-radius: 0.375rem;
          border-color: rgba(0, 0, 0, 0.175);
        }
      }
    }
  }
</style>