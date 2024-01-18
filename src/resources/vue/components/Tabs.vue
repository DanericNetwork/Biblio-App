<template>
  <div class="tabs-main-div">
    <ul class="tabs">
      <li
        v-for="(tab, index) in tabs"
        :key="index"
        class="tab"
        @click="changeTab(index)"
        :class="{ active: activeTab === index }"
      >
        {{ tab.name }}
      </li>
    </ul>
    <div class="tab-content-container">
      <div
        v-for="(tab, index) in tabs"
        :key="index"
        class="tab-content"
        :class="{ active: activeTab === index }"
      >
        <item-card
          v-for="(item, itemIndex) in tab.items"
          :key="itemIndex"
          :tab="tab"
          :itemIndex="itemIndex"
        />
      </div>
    </div>
  </div>
</template>

<script>
import ItemCard from "./ItemCard.vue";
import Box from "./Box.vue";

export default {
  components: {
    ItemCard,
    Box,
  },
  data() {
    return {
      activeTab: 0,
      tabs: [
        {
          name: "In bezit",
          items: [
            {
              content: "Content 1.1",
              description: "Description 1.1",
              warning: true,
            },
            {
              content: "Content 1.2",
              description: "Description 1.2",
              warning: false,
            },
            {
              content: "Content 1.3",
              description: "Description 1.3",
              warning: true,
            },
            {
              content: "Content 1.3",
              description: "Description 1.3",
              warning: true,
            },
            {
              content: "Content 1.3",
              description: "Description 1.3",
              warning: true,
            },
            {
              content: "Content 1.3",
              description: "Description 1.3",
              warning: true,
            },
            {
              content: "Content 1.3",
              description: "Description 1.3",
              warning: true,
            },
          ],
        },
        {
          name: "Verleden",
          items: [
            {
              content: "Content 2.1",
              description: "Description 2.1",
              warning: false,
            },
            {
              content: "Content 2.2",
              description: "Description 2.2",
              warning: true,
            },
          ],
        },
        {
          name: "Boetes",
          items: [
            {
              content: "Content 3.1",
              description: "Description 3.1",
              warning: true,
            },
            {
              content: "Content 3.2",
              description: "Description 3.2",
              warning: false,
            },
          ],
        },
        {
          name: "Reservering",
          items: [
            {
              content: "Content 4.1",
              description: "Description 4.1",
              warning: false,
            },
            {
              content: "Content 4.2",
              description: "Description 4.2",
              warning: true,
            },
          ],
        },
      ],
    };
  },
  methods: {
    changeTab(index) {
      this.activeTab = index;
    },
  },
};
</script>

<style lang="scss">
.tabs-main-div {
  max-width: 100%;
  margin: 0 auto;
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
}

.tabs {
  display: flex;
  list-style: none;
  padding: 0;
  margin: 0;
  width: 100%;
  justify-content: flex-end;
}

.tab {
  padding: 10px;
  cursor: pointer;
  background-color: grey;
  border: 1px solid grey;
  border-radius: 5px 5px 0 0;
}

.tab:hover {
  background-color: #e57e1f;
}

.tab.active {
  background-color: #e57e1f;
  border-bottom: 1px solid #e57e1f;
}

.tab-content-container {
  flex: 1;
  display: flex;
  overflow-y: auto;
}

.tab-content {
  flex: 1;
  min-height: 0;
  display: none;
  padding: 20px;
  height: 90vh;
  background-color: #e57e1f;
  border: 1px solid #ccc;
  border-radius: 0 0 5px 5px;
  box-sizing: border-box;
}

.tab-content.active {
  display: flex;
  flex-direction: column;
}

.tab:nth-child(1),
.tab:nth-child(2),
.tab:nth-child(3),
.tab:nth-child(4) {
  width: 25%;
}

.item-card {
  margin-bottom: 10px;
  width: 95%;
  height: 50px;
}
</style>
