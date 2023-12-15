<template>
    <div v-html="iconSVG"></div>
</template>

<script>
export default {
  props: {
    icon: String,
    color: String,
    size: String,
  },
  computed: {
    iconSVG() {
      switch (this.icon) {
        case 'full-star':
          return `<svg width="${this.size || 24}" height="${this.size || 24}" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.0008 17L6.12295 20.5902L7.72105 13.8906L2.49023 9.40983L9.35577 8.85942L12.0008 2.5L14.6458 8.85942L21.5114 9.40983L16.2806 13.8906L17.8787 20.5902L12.0008 17Z" fill="${this.color || 'black'}"/></svg>`;
        case 'half-star':
          return `<svg width="${this.size || 24}" height="${this.size || 24}" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.0008 14.6564L14.8175 16.3769L14.0517 13.1664L16.5583 11.0192L13.2683 10.7554L12.0008 7.70792V14.6564ZM12.0008 17L6.12295 20.5902L7.72105 13.8906L2.49023 9.40983L9.35577 8.85942L12.0008 2.5L14.6458 8.85942L21.5114 9.40983L16.2806 13.8906L17.8787 20.5902L12.0008 17Z" fill="${this.color || 'black'}"/></svg>`;
        case 'empty-star':
          return `<svg width="${this.size || 24}" height="${this.size || 24}" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.0008 17L6.12295 20.5902L7.72105 13.8906L2.49023 9.40983L9.35577 8.85942L12.0008 2.5L14.6458 8.85942L21.5114 9.40983L16.2806 13.8906L17.8787 20.5902L12.0008 17ZM12.0008 14.6564L14.8175 16.3769L14.0517 13.1664L16.5583 11.0192L13.2683 10.7554L12.0008 7.70792L10.7333 10.7554L7.44326 11.0192L9.94991 13.1664L9.18408 16.3769L12.0008 14.6564Z" fill="${this.color || 'black'}"/></svg>`;
        default:
          return '';
      }
    }
  }
}
</script>

<style></style>
