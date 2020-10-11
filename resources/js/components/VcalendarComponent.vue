<template>
  <div>
    <v-calendar :attributes="attrs" nav-visibility="visible"></v-calendar>
  </div>
</template>

<script>
export default {
  data() {
    return {
      attrs: [
        {
          key: 'today',
          bar: {
            height: '3px',
            backgroundColor: 'red',
            borderColor: null,
            borderWidth: '1px',
            borderStyle:'solid',
            opacity: 1
          },
          dates: {
            start: new Date(),
            monthlyInterval: 2,
            ordinalWeekdays: { [-1]: 6 }
          },
          popover: {
            label: 'メッセージを表示できます',
          },
          backgroundColor: '#111',
          border: '1px solid #111',
        },
      ],
    };
  },
};
</script>
