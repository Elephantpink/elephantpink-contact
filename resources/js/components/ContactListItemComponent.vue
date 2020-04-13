<template>
  <div class="contact" :class="{ 'active': showHidden }">
    <div class="row">
      <div class="title">{{ contact.name }}</div>
      <div class="email">{{ contact.email }}</div>
      <div class="phone">{{ contact.phone }}</div>
      <div class="date">{{ contact.date }}</div>
      <div class="options">
        <button class="toggle-text" @click="toggleHidden()">
          <span v-show="!showHidden">
            <svg-vue icon="eye" class="icon" />
            {{ $root.trans('contacts_admin.show') }}&nbsp;
            <!-- <span
              class="desktop"
            >{{ $root.trans('contacts_admin.message') }}</span>-->
          </span>
          <span v-show="showHidden">
            <svg-vue icon="eye-closed" class="icon" />
            {{ $root.trans('contacts_admin.hide') }}&nbsp;
            <!-- <span
              class="desktop"
            >{{ $root.trans('contacts_admin.message') }}</span>-->
          </span>
        </button>
      </div>
    </div>
    <div ref="expandable" class="expandable-field">
      <div class="responsive">
        <span>{{ $root.trans('contacts_admin.email') }}:</span>
        {{ contact.email}}
      </div>
      <div class="responsive">
        <span>{{ $root.trans('contacts_admin.phone') }}:</span>
        {{ contact.phone}}
      </div>
      <div class="responsive">
        <span>{{ $root.trans('contacts_admin.date') }}:</span>
        {{ contact.date }}
      </div>
      <div class="message">
        <span>{{ $root.trans('contacts_admin.message') }}:</span>
        {{ contact.message }}
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    // Props are data comming from the parent component.
    contact: { type: Object, default: null }
  },
  data() {
    return {
      // Add here the variables for this component.
      showHidden: false
    };
  },
  methods: {
    toggleHidden() {
      this.showHidden = !this.showHidden;
      if (this.showHidden) {
        let innerHeight = 55;
        if (window.innerWidth < 990) {
          innerHeight += 46;
        }
        Array.from(this.$refs.expandable.children).forEach(c => {
          innerHeight += c.clientHeight;
        });
        this.$el.style.height = 71 + innerHeight + "px";
        this.$refs.expandable.style.height = innerHeight + "px";
      } else {
        this.$el.style = null;
        this.$refs.expandable.style = null;
      }
    }
  }
};
</script>

<style lang="scss" scoped>
.contact {
  position: relative;
  background-color: #ffffff;
  margin-bottom: 20px;
  height: 71px;
  transition: height 0.25s ease-in-out;
  box-sizing: border-box;
  overflow: hidden;

  .row {
    z-index: 2;
    box-shadow: 0 2px 14px rgba(0, 0, 0, 0.04);
    padding: 0 30px;
    height: 71px;

    .options {
      width: 25%;
      height: 100%;

      button {
        outline: none;
        border: 0;
        background: transparent;
        text-transform: capitalize;
        font-family: "rubiklight";
        cursor: pointer;
        height: 100%;
        width: 100%;
        justify-content: left;
        padding: 0;

        span {
          display: flex;
          align-items: center;

          .icon {
            margin-right: 15px;
            margin-left: 0;
            fill: #d8875c;
          }
        }
      }
    }
  }

  .expandable-field {
    height: 71px;
    display: flex;
    align-items: center;
    position: absolute;
    padding: 0 40px;
    left: 0;
    bottom: 0;
    width: 100%;
    z-index: 1;
    font-family: "rubiklight";
    box-sizing: border-box;
    overflow: hidden;

    .responsive {
      display: none;
    }

    .message {
      span {
        display: none;
      }
    }
  }
}

@media only screen and (max-width: 990px) {
  .contact {
    .options {
      button {
        span.desktop {
          display: none;
        }
      }
    }

    .expandable-field {
      flex-direction: column;
      align-items: flex-start;
      text-align: left;
      padding: 10px 30px 20px;

      div {
        margin: 10px 0;

        &.responsive {
          display: block;
        }

        span {
          font-family: rubikmedium;
        }

        &.message {
          span {
            display: block;
            margin-bottom: 5px;
          }
        }
      }
    }
  }
}
</style>
