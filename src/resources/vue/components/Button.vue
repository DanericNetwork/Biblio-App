<template>
	<div class="button" :class="{disabled : disabled}" :style="{ backgroundColor: color }" @click="buttonAction">
	{{ content }}
	</div>
</template>

<script>
	export default {
		name: 'Button',
		props: {
			color: {
				type: String,
				default: '#FF8C00',
			},
			disabled: {
				type: Boolean,
				default: false,
			},
			content: {
				type: String,
				default: 'Button',
			},
			buttonAction: {
				type: Function,
				default: () => {},
			},
		},
	};
</script>

<style lang="scss">
	.button {
		display: flex;
		justify-content: center;
		align-items: center;
		width: 206px;
		height: 50px;
		cursor: pointer;
		border-radius: 12px;
		font-size: 24px;
		font-weight: 500;

		&.disabled {
			opacity: 0.5;
			cursor: not-allowed;
		}
	}
</style>