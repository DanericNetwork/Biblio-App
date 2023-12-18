<template>
	<div class="index">
		<Box>
			<div class="content">
				<svg class="scan-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
					<path d="M15 3H21V8H19V5H15V3ZM9 3V5H5V8H3V3H9ZM15 21V19H19V16H21V21H15ZM9 21H3V16H5V19H9V21ZM3 11H21V13H3V11Z"></path>
				</svg>
				<span class="text">Scan een artikel om te lenen</span>
			</div>
			<Input type="text" placeholder="Voer wat in" class="text-medium" />
			<Button content="Zoek" buttonAction="alert('hmmm')" />
		</Box>
	</div>
</template>
<script>
	import Box from '../components/Box.vue';
	import Button from '../components/Button.vue';
	import Input from '../components/Input.vue';

	export default {
		name: 'index',
		components: {
			Box,
			Button,
			Input
		},
		methods: {
			buttonAction() {
				alert('Button clicked!');
			},
		},
	};

</script>
<style lang="scss">
	.index {
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		height: 100vh;

		.content {
			display: flex;
			align-items: center;
			flex-direction: row;
			gap: 40px;
			margin-bottom: 17px;

			.text {
				color: #000;
				max-width: 245px;
				font-size: 28px;
				font-weight: 700;
				text-align: center;
			}

			.scan-icon {
				width: 54px;
				height: 53px;
			}
		}

		.button {
			margin-top: 15px;
		}
	}
</style>