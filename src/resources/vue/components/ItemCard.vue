<template>
    <div class="item-card">
        <div class="left">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                width="90"
                height="90"
                viewBox="0 0 90 90"
                fill="none"
            >
                <path
                    d="M21.4337 7C20.7734 7 20.2074 7.09434 19.6413 7.28301C15.9622 8.03771 13.0377 10.9622 12.283 14.6413C12 15.2074 12 15.7734 12 16.4337V68.3194C12 76.1494 18.3206 82.47 26.1506 82.47H78.0362V73.0362H26.1506C23.5092 73.0362 21.4337 70.9608 21.4337 68.3194C21.4337 65.6779 23.5092 63.6025 26.1506 63.6025H78.0362V11.7169C78.0362 9.07542 75.9608 7 73.3194 7H68.6025V35.3012L59.1687 25.8675L49.735 35.3012V7H21.4337Z"
                    fill="white"
                />
            </svg>
            <div class="info">
                <p>{{ title }}</p>
                <p>{{ description }}</p>
            </div>
        </div>
        <div v-if="warning === 'true'" class="right">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                width="35"
                height="35"
                viewBox="0 0 35 35"
                fill="none"
            >
                <g clip-path="url(#clip0_21_835)">
                    <path
                        d="M17.5 2.1875C18.4707 2.1875 19.3663 2.7002 19.8584 3.54102L34.6241 28.6973C35.1231 29.5449 35.1231 30.5908 34.6377 31.4385C34.1524 32.2861 33.2432 32.8125 32.2657 32.8125H2.73442C1.75688 32.8125 0.847697 32.2861 0.362345 31.4385C-0.123007 30.5908 -0.116171 29.5381 0.376017 28.6973L15.1416 3.54102C15.6338 2.7002 16.5293 2.1875 17.5 2.1875ZM17.5 10.9375C16.5909 10.9375 15.8594 11.6689 15.8594 12.5781V20.2344C15.8594 21.1436 16.5909 21.875 17.5 21.875C18.4092 21.875 19.1407 21.1436 19.1407 20.2344V12.5781C19.1407 11.6689 18.4092 10.9375 17.5 10.9375ZM19.6875 26.25C19.6875 25.6698 19.4571 25.1134 19.0468 24.7032C18.6366 24.293 18.0802 24.0625 17.5 24.0625C16.9199 24.0625 16.3635 24.293 15.9532 24.7032C15.543 25.1134 15.3125 25.6698 15.3125 26.25C15.3125 26.8302 15.543 27.3866 15.9532 27.7968C16.3635 28.207 16.9199 28.4375 17.5 28.4375C18.0802 28.4375 18.6366 28.207 19.0468 27.7968C19.4571 27.3866 19.6875 26.8302 19.6875 26.25Z"
                        fill="#E57E1F"
                    />
                </g>
                <defs>
                    <clipPath id="clip0_21_835">
                        <rect width="35" height="35" fill="white" />
                    </clipPath>
                </defs>
            </svg>
        </div>
    </div>
</template>

<script>
export default {
    name: "ItemCard",
    props: {
        title: String,
        description: String,
        warning: Boolean,
    },
};
</script>

<style lang="scss">
.item-card {
    width: 667px;
    height: 116px;
    background: #1D243A;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 13px;

    .left {
        display: flex;
        align-items: center;
        width: 100%;
        height: 100%;

        .info {
            margin-left: 20px;
            display: flex;
            flex-direction: column;

            p {
                color: #fff;
                font-size: 32px;
                font-family: "Outfit";
                font-weight: 700;
            }
        }
    }

    .right {
        display: flex;
        align-items: flex-start;
        height: 100%;
    }

}
</style>
