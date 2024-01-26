<template>
  <AdminLayout >
    <admin-modal
      :wrapperWidth="modal.wrapper.width"
      :wrapperHeight="modal.wrapper.height"
      :modalWidth="modal.width"
      :modalHeight="modal.height"
    >
    </admin-modal>
    <div id="item-page-content" class="item-page-content">
      <div class="header">
        <h1>Items</h1>
      </div>
      <div class="table">
        <table class="table table-hover">
          <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Titel</th>
            <th scope="col">Beschrijving</th>
            <th scope="col">Auteur</th>
            <th scope="col">Categorie</th>
            <th scope="col">Leeftijd</th>
            <th scope="col">ISBN</th>
          </tr>
          </thead>
          <tbody>
          <tr v-for="item in items.data">
            <th scope="row">{{item.id}}</th>
            <td>{{item.name}}</td>
            <td>{{item.description}}</td>
            <td>{{item.author}}</td>
            <td>{{item.category}}</td>
            <td>{{item.age_rating}}</td>
            <td>{{item.ISBN ?? 'Onbekend'}}</td>
          </tr>
          </tbody>
        </table>
      </div>
      <Pagination :links="items.links" />
    </div>
  </AdminLayout>
</template>
<script>
import AdminLayout from "@layouts/admin-layout.vue";
import Pagination from "@components/admin/pagination.vue";
import adminModal from "@components/admin/ui/modal.vue";
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'
export default {
  name: "admin-items-index",
  components: {
    AdminLayout,
    Pagination,
    adminModal
  },
  data() {
    return {
      modal: {
        wrapper: {
          width: "100%",
          height: "100%",
        },
        width: null,
        height: null,
        show: true,
      }
    }
  },
  setup() {
    const page = usePage();
    const items = computed(() => page.props.items);
    return {items};
  },
  async created() {
    await this.waitForElm(".item-page-content")
      .then((elm) => {
        this.modal.wrapper.width = elm.offsetWidth + "px";
        this.modal.wrapper.height = elm.offsetHeight + "px";

        // listen for window resize event
        this.windowResizeListener();
      })
  },
  methods: {
    waitForElm(selector) {
      return new Promise(resolve => {
        if (document.querySelector(selector)) {
          return resolve(document.querySelector(selector));
        }

        const observer = new MutationObserver(mutations => {
          if (document.querySelector(selector)) {
            observer.disconnect();
            resolve(document.querySelector(selector));
          }
        });

        observer.observe(document.body, {
          childList: true,
          subtree: true
        });
      });
    },
    windowResizeListener() {
      window.addEventListener("resize", () => {
        const content = document.getElementById("item-page-content");
        this.modal.wrapper.width = content.offsetWidth + "px";
        this.modal.wrapper.height = content.offsetHeight + "px";
      });
    }
  },
  watch: {
    "modal.wrapper": {
      handler(wrapper) {
        // converts wrapper width and height from ConstrainedULong to string,
        // then removes the "px" from the string and converts it to a number
        const width = Number(String(wrapper.width).replace("px", ""));
        const height = Number(String(wrapper.height).replace("px", ""));

        this.modal.width = (width - 70) + "px";
        this.modal.height = (height - 70) + "px";
      },
      deep: true
    }
  }
}
</script>

<style scoped lang="scss">

.item-page-content {
  width: 100%;
  height: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: flex-start;
  padding: 50px;
  overflow: scroll;
}

.header {
  display: flex;
  justify-content: flex-start;
  width: 100%;
  padding-left: 30px;
  margin-bottom: 10px;
}

.table {
  padding: 0 30px 0 30px;
}

table {
  border-collapse: collapse;
  border-radius: 1em;
  overflow: hidden;
}

tbody:has(tr) {
  cursor: pointer;
}

td, th {
  max-width: 210px;
  text-overflow: ellipsis;
  overflow: hidden;
  white-space: nowrap;
}
</style>
