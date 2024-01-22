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
       <span class="tab-name"> {{ tab.name }}</span>
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
          :item="tab.items[itemIndex]"
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
              title: "Content 1.1",
              description: "Description 1.1",
              warning: true,
            },
            {
              title: "Content 1.2",
              description: "Description 1.2",
              warning: false,
            },
            {
              title: "Content 1.3",
              description: "Description 1.3",
              warning: true,
            },
            {
              title: "Content 1.3",
              description: "Description 1.3",
              warning: true,
            },
            {
              title: "Content 1.3",
              description: "Description 1.3",
              warning: true,
            },
            {
              title: "Content 1.3",
              description: "Description 1.3",
              warning: true,
            },
            {
              title: "Content 1.3",
              description: "Description 1.3",
              warning: true,
            },
            {
              title: "Content 1.3",
              description: "Description 1.3",
              warning: true,
            },
            {
              title: "Content 1.3",
              description: "Description 1.3",
              warning: true,
            },
            {
              title: "Content 1.3",
              description: "Description 1.3",
              warning: true,
            },
          ],
        },
        {
          name: "Verleden",
          items: [
            {
              title: "Content 2.1",
              description: "Description 2.1",
              warning: false,
            },
            {
              title: "Content 2.2",
              description: "Description 2.2",
              warning: true,
            },
          ],
        },
        {
          name: "Boetes",
          items: [
            {
              title: "Content 3.1",
              description: "Description 3.1",
              warning: true,
            },
            {
              title: "Content 3.2",
              description: "Description 3.2",
              warning: false,
            },
          ],
        },
        {
          name: "Reservering",
          items: [
            {
              title: "Content 4.1",
              description: "Description 4.1",
              warning: false,
            },
            {
              title: "Content 4.2",
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
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
  height: 100vh;
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
  background-color: #D9D9D9;
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
  height: 100%;
  overflow-y: scroll;
  background-color: #e57e1f;
}

.tab-content {
  flex: 1;
  min-height: 0;
  display: none;
  padding: 20px;
  height: 100vh;
  background-color: #e57e1f;
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

.tab-name {
  font-size: 20px;
  font-weight: 700;
  color: #000;
}
</style>
