<template>
  <div class="contact-page full-height">
    <nav class="topbar-container" />

    <div class="view-wrapper">
      <div class="view-container">
        <div class="table-container">
          <orderable-headers-component
            :config="contactsTableConfig"
            :extraHeader="true"
            :extraHeaderName="'contacts_admin.message'"
            :extraHeaderClass="'long'"
            @update-order-by="updateOrderBy($event)"
          />
          <contact-list-item-component
            v-for="(contact, contactIndex) in contactsList"
            :key="'contact-' + contactIndex"
            :contact="contact"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
// Do your imports here
import ContactListItemComponent from "../components/ContactListItemComponent";
import OrderableHeadersComponent from "../components/OrderableHeadersComponent";
import { mapGetters } from "vuex";

export default {
  layout: "admin",
  components: {
    // Add your imported components here.
    ContactListItemComponent,
    OrderableHeadersComponent
  },
  data() {
    return {
      // Add here the variables for this component.
      contactsTableConfig: {
        headers: ["contacts_admin.name", "contacts_admin.email", "contacts_admin.phone", "contacts_admin.date"],
        fields: ["name", "email", "phone", "date"],
        orderBy: [4],
        hiddenField: "message"
      }
    };
  },
  computed: {
    // Define your computed variables (reactive) here.
    ...mapGetters(["contacts"]),
    contactsList: function() {
      let contactsList = JSON.parse(JSON.stringify(this.contacts));

      Object.values(contactsList).forEach(c => {
        c.date = this.parseDate(c.created_at);
        c.created_at = new Date(c.created_at);
      });

      return this.$root.prepareTable(
        Object.values(contactsList),
        this.contactsTableConfig.fields,
        this.contactsTableConfig.orderBy
      );
    }
  },
  methods: {
    // Define your component methods here.
    parseDate(date) {
      date = new Date(date);
      let day = date.getDate() < 10 ? "0" + date.getDate() : date.getDate();
      let month =
        date.getMonth() < 9 ? "0" + (date.getMonth() + 1) : date.getMonth() + 1;
      let year = date
        .getFullYear()
        .toString()
        .substr(-2, 2);
      let hours =
        date.getHours() < 10 ? "0" + date.getHours() : date.getHours();
      let minutes =
        date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes();

      return day + "." + month + "." + year + " @ " + hours + ":" + minutes;
    },
    updateOrderBy(field) {
      if (Math.abs(this.contactsTableConfig.orderBy[0]) === field) {
        Vue.set(
          this.contactsTableConfig.orderBy,
          0,
          this.contactsTableConfig.orderBy[0] * -1
        );
      } else {
        Vue.set(this.contactsTableConfig.orderBy, 0, field);
      }
    }
  }
};
</script>