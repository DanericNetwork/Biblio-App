<template>
  <AdminLayout :user-data="userData">
    <div class="admin-content">
      <div class="dashboard">
        <span class="dashboard-title">Dashboard</span>
        <div class="info-cards">
          <div class="card">
            <div class="card-body text-center">
              <span class="card-title">Items</span>
              <p class="card-text">{{ count.items }}</p>
            </div>
          </div>
          <div class="card">
            <div class="card-body text-center">
              <span class="card-title">Klanten</span>
              <p class="card-text">{{ count.customers }}</p>
            </div>
          </div>
          <div class="card">
            <div class="card-body text-center">
              <span class="card-title">Reserveringen</span>
              <p class="card-text">{{ count.reservations }}</p>
            </div>
          </div>
          <div class="card">
            <div class="card-body text-center">
              <span class="card-title">Openstaande Facturen</span>
              <p class="card-text">{{ count.invoices }}</p>
            </div>
          </div>
        </div>
        <div class="charts">
          <apexchart class="chart" width="95%" type="bar" :options="optionsChart1" :series="seriesChart1"></apexchart>
          <apexchart class="chart" width="95%" type="bar" :options="optionsChart2" :series="seriesChart2"></apexchart>
        </div>
      </div>
    </div>
  </AdminLayout>
</template>

<script>
import AdminLayout from "../../layouts/admin-layout.vue";
export default {
  name: "admin-index",
  components: {
    AdminLayout,
  },
  props: {
      userData: {
        type: Object,
        required: true,
      },
      count: {
        type: Object,
        required: true,
        default: () => ({
          items: 0,
          customers: 0,
          reservations: 0,
          openInvoices: 0,
        }),
      },
      chart1: {
        type: Object,
        required: true,
        default: () => ({
          labels: [],
          series: [],
        }),
      },
      chart2: {
        type: Object,
        required: true,
        default: () => ({
          labels: [],
          series: [],
        }),
      }
    },
    data: function () {
      return {
        optionsChart1: {
          chart: {
            id: "item-chart",
            background: "#f2f2f2",
          },
          title: {
            text: "Items in gebruik",
            align: "center",
          },
          xaxis: {
            categories: this.chart1.labels,
          },
        },
        seriesChart1: [
          {
            data: this.chart1.series,
          }
        ],
        optionsChart2: {
          chart: {
            id: "item-chart",
            background: "#f2f2f2",
          },
          title: {
            text: "Aantal nieuwe klanten per dag",
            align: "center",
          },
          xaxis: {
            categories: this.chart2.labels,
          },
        },
        seriesChart2: [
          {
            data: this.chart2.series,
          }
        ],
      };
    },
  }
</script>

<style lang="scss">
.admin-content {
  display: flex;
  height: 100%;
  width: 100%;

  .dashboard {
    display: flex;
    flex-direction: column;
    align-items: start;
    width: 100%;
    padding: 1.3rem;

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
