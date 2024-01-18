<template>
<AdminLayout :user-data="{name: 'John Doe'}">
  <div class="admin-content">
    <div class="dashboard">
      <span class="dashboard-title">Dashboard</span>
      <div class="info-cards">
        <div class="card">
          <div class="card-body text-center">
            <span class="card-title">Items</span>
            <p class="card-text">{{ itemCount }}</p>
          </div>
        </div>
        <div class="card">
          <div class="card-body text-center">
            <span class="card-title">Klanten</span>
            <p class="card-text">{{ customerCount }}</p>
          </div>
        </div>
        <div class="card">
          <div class="card-body text-center">
            <span class="card-title">Reserveringen</span>
            <p class="card-text">{{ reservationCount }}</p>
          </div>
        </div>
        <div class="card">
          <div class="card-body text-center">
            <span class="card-title">Openstaande Facturen</span>
            <p class="card-text">{{ openInvoiceCount }}</p>
          </div>
        </div>
      </div>
      <div class="charts">
        <apexchart class="chart" width="95%" type="bar" :options="options" :series="series"></apexchart>
        <apexchart class="chart" width="95%" type="bar" :options="options2" :series="series2"></apexchart>
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
    itemCount: {
      type: Number,
      default: 1234,
      required: true,
    },
    customerCount: {
      type: Number,
      default: 123,
      required: true,
    },
    reservationCount: {
      type: Number,
      default: 12,
      required: true,
    },
    openInvoiceCount: {
      type: Number,
      default: 1,
      required: true,
    }
  },
  data() {
    return {
      options: {
        chart: {
          id: "item-chart",
          background: "#f2f2f2",
        },
        title: {
          text: "Items in gebruik",
          align: "left",
          style: {
            color: "#000",
          },
        },
        xaxis: {
          categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998],
        },
      },
      series: [
        {
          name: "series-1",
          data: [30, 40, 45, 50, 49, 60, 70, 91],
        }
      ],
      options2: {
        chart: {
          id: "item-chart",
          background: "#f2f2f2",
        },
        title: {
          text: "Aantal nieuwe klanten per dag",
          align: "left",
          style: {
            color: "#000",
          },
        },
        xaxis: {
          categories: [11, 111, 1111, 1111, 1995, 1996, 1997, 1998],
        },
      },
      series2: [
        {
          name: "series-1",
          data: [300, 40, 25, 500, 439, 630, 370, 191],
        }
      ],
    };
  }
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
