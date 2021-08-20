<template>
  <div>
    <nav class="navbar is-fixed-top box-shadow-y">
      <div class="navbar-brand">
        <a role="button" class="navbar-burger toggler" @click="toggler"  aria-label="menu" aria-expanded="false">
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </a>
        <NuxtLink to="/" class="is-hidden-tablet navbar-item has-text-weight-bold has-text-black">
          <img src="~assets/images/main-logo.svg" alt="">
        </NuxtLink>
        <a role="button" class="navbar-burger nav-toggler" aria-label="menu" aria-expanded="false">
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </a>
      </div>
      <div class="navbar-menu has-background-white">
        <div class="navbar-end">
          <div class="mr-5 my-3 field">
            <p class="control has-icons-left has-icons-right">
              <input class="input is-small" type="email" placeholder="Search something">
              <span class="icon is-small is-left">
                                <font-awesome-icon :icon="['fas', 'search']"/>
                            </span>
            </p>
          </div>

          <div class="navbar-item is-hoverable">
            <MessageDropdown/>
          </div>

          <div class="navbar-item has-dropdown is-hoverable">
            <a href="#" class="navbar-link user-navbar">
              <div class="user-avatar has-background-primary mr-3">
                <font-awesome-icon :icon="['fas', 'user']"/>
              </div>
              {{ loggedInUser.first_name }}
            </a>
            <div class="navbar-dropdown is-right">
              <div class="profile_dropdown_content">
                <div class="is-flex fd--r px-3 py-2">
                  <div class="user-avatar has-background-primary mr-3">
                    <font-awesome-icon :icon="['fas', 'user']"/>
                  </div>
                  <div class="is-flex fd--c ai--fs">
                    <span class="is-size-7 has-text-black has-text-weight-medium"> {{ loggedInUser.first_name }}  </span>
                    <span class="is-size-7 has-text-dark">{{ loggedInUser.email }}  </span>
                  </div>
                </div>
                <hr class="navbar-divider" />
                <NuxtLink to="/profile" class="navbar-item">
                  <font-awesome-icon :icon="['fas', 'user-edit']" class="mr-2"/>
                  Edit Profile
                </NuxtLink>

                <NuxtLink  to="/subscription" class="navbar-item">
                  <font-awesome-icon :icon="['fas', 'money-bill']" class="mr-2"/>
                  Subscription Plan : {{ getRole[0] }}
                </NuxtLink>
                <a @click.prevent="logout()" class="navbar-item">
                  <font-awesome-icon :icon="['fas', 'sign-out-alt']" class="mr-2"/>
                  Log Out</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>

    <div class="columns is-variable is-0 mb-0">
      <div>
        <div class="menu-container has-background-primary" v-bind:class="{ active: isActive }">
          <NuxtLink to="/dashboard" class="navbar-brand has-text-weight-bold has-text-black">
            <img src="~assets/images/admin-logo.svg" alt="">
          </NuxtLink>
          <div class="menu-wrapper py-1">
            <aside class="menu">
              <ul class="menu-list">
                <li v-if="getPermission.includes('dashboard menu')" @click="menu" class="simplemenu">
                  <NuxtLink to="/dashboard" >
                    <font-awesome-icon :icon="['fas', 'tachometer-alt']" class="mt-1 mr-2" />
                    Dashboard</NuxtLink>
                </li>
                <li v-if="getPermission.includes('calendar menu')" @click="menu" class="simplemenu">
                  <NuxtLink to="/calendar">
                    <font-awesome-icon :icon="['fas', 'calendar']" class="mt-1 mr-2" />
                    Calendar</NuxtLink>
                </li>
                <li class="collapsible" id="information" v-if="getPermission.includes('files menu')" @click="menuDropdown('information')">
                  <a href="#">
                    <font-awesome-icon :icon="['fas', 'question-circle']" class="mt-1 mr-2" />
                    Information
                    <font-awesome-icon :icon="['fas', 'angle-down']" class="mt-1 mr-2 is-pulled-right" />
                  </a>
                </li>
                <div class="content mb-0">
                  <ul>
                    <li v-if="getPermission.includes('company menu')" @click="menu" class="simplemenu">
                      <NuxtLink to="/company" >
                        <font-awesome-icon :icon="['fas', 'tachometer-alt']" class="mt-1 mr-2" />
                        Company</NuxtLink>
                    </li>
                    <li v-if="getPermission.includes('files menu')" @click="menu" class="simplemenu">
                      <NuxtLink to="/files" >
                        <font-awesome-icon :icon="['fas', 'file']" class="mt-1 mr-2" />
                        Files
                      </NuxtLink>
                    </li>
                    <li v-if="getPermission.includes('objects index')">
                      <NuxtLink to="/mediaobject"> <font-awesome-icon :icon="['fas', 'angle-right']" class="mt-1 mr-2" /> Objects</NuxtLink>
                    </li>
                    <li v-if="getPermission.includes('addresses index')">
                      <NuxtLink to="/addr"> <font-awesome-icon :icon="['fas', 'angle-right']" class="mt-1 mr-2" /> Addresses</NuxtLink>
                    </li>
                    <li v-if="getPermission.includes('chan index')">
                      <NuxtLink to="/chan"> <font-awesome-icon :icon="['fas', 'angle-right']" class="mt-1 mr-2" /> Chan</NuxtLink>
                    </li>
                    <li v-if="getPermission.includes('refn index')">
                      <NuxtLink to="/refn"> <font-awesome-icon :icon="['fas', 'angle-right']" class="mt-1 mr-2" /> Refn</NuxtLink>
                    </li>
                    <li v-if="getPermission.includes('subm index')">
                      <NuxtLink to="/subm"> <font-awesome-icon :icon="['fas', 'angle-right']" class="mt-1 mr-2" /> Subm</NuxtLink>
                    </li>
                    <li v-if="getPermission.includes('subn index')">
                      <NuxtLink to="/subn"> <font-awesome-icon :icon="['fas', 'angle-right']" class="mt-1 mr-2" /> Subn</NuxtLink>
                    </li>
                  </ul>
                </div>
                <li class="collapsible" id="sources"  v-if="getPermission.includes('sources menu')" @click="menuDropdown('sources')">
                  <a href="#">
                    <font-awesome-icon :icon="['fas', 'cog']" class="mt-1 mr-2" />
                    Sources
                    <font-awesome-icon :icon="['fas', 'angle-down']" class="mt-1 mr-2 is-pulled-right" />
                  </a>
                </li>
                <div class="content mb-0">
                  <ul>
                    <li v-if="getPermission.includes('repositories index')">
                      <NuxtLink to="/repository"><font-awesome-icon :icon="['fas', 'angle-right']" class="mt-1 mr-2" />Repositories</NuxtLink>
                    </li>
                    <li v-if="getPermission.includes('sources index')">
                      <NuxtLink to="/source"> <font-awesome-icon :icon="['fas', 'angle-right']" class="mt-1 mr-2" /> Sources</NuxtLink>
                    </li>
                    <li v-if="getPermission.includes('source data index')">
                      <NuxtLink to="/sourcedata"> <font-awesome-icon :icon="['fas', 'angle-right']" class="mt-1 mr-2" /> Source Data</NuxtLink>
                    </li>
                    <li v-if="getPermission.includes('source data events index')">
                      <NuxtLink to="/sourcedataeven"> <font-awesome-icon :icon="['fas', 'angle-right']" class="mt-1 mr-2" /> Source Data Events</NuxtLink>
                    </li>
                    <li v-if="getPermission.includes('source ref events index')">
                      <NuxtLink to="/sourcerefeven"> <font-awesome-icon :icon="['fas', 'angle-right']" class="mt-1 mr-2" /> Source Ref Events</NuxtLink>
                    </li>
                  </ul>
                </div>
                <li class="collapsible" id="people" v-if="getPermission.includes('people menu')" @click="menuDropdown('people')">
                  <a>
                    <font-awesome-icon :icon="['fas', 'user-friends']" class="mt-1 mr-2" />
                    People
                    <font-awesome-icon :icon="['fas', 'angle-down']" class="mt-1 mr-2 is-pulled-right" />
                  </a>
                </li>
                <div class="content mb-0">
                  <ul>
                    <li v-if="getPermission.includes('people index')">
                      <NuxtLink to="/person"> <font-awesome-icon :icon="['fas', 'angle-right']" class="mt-1 mr-2" /> People</NuxtLink>
                    </li>
                    <li v-if="getPermission.includes('person aliases index')">
                      <NuxtLink to="/personalia"> <font-awesome-icon :icon="['fas', 'angle-right']" class="mt-1 mr-2" /> Person Aliases</NuxtLink>
                    </li>
                    <li v-if="getPermission.includes('person anci index')">
                      <NuxtLink to="/personanci"> <font-awesome-icon :icon="['fas', 'angle-right']" class="mt-1 mr-2" /> Person Anci</NuxtLink>
                    </li>
                    <li v-if="getPermission.includes('person association index')">
                      <NuxtLink to="/personasso"> <font-awesome-icon :icon="['fas', 'angle-right']" class="mt-1 mr-2" /> Person Association</NuxtLink>
                    </li>
                    <li v-if="getPermission.includes('person events index')">
                      <NuxtLink to="/personevent"> <font-awesome-icon :icon="['fas', 'angle-right']" class="mt-1 mr-2" /> Person Events</NuxtLink>
                    </li>
                    <li v-if="getPermission.includes('person lds index')">
                      <NuxtLink to="/personlds"> <font-awesome-icon :icon="['fas', 'angle-right']" class="mt-1 mr-2" /> Person LDS</NuxtLink>
                    </li>
                    <li v-if="getPermission.includes('person subm index')">
                      <NuxtLink to="/personsubm"> <font-awesome-icon :icon="['fas', 'angle-right']" class="mt-1 mr-2" /> Person Subm</NuxtLink>
                    </li>
                  </ul>
                </div>
                <li class="collapsible" id="family" v-if="getPermission.includes('family menu')" @click="menuDropdown('family')">
                  <a href="#">
                    <font-awesome-icon :icon="['fas', 'heart']" class="mt-1 mr-2" />
                    Family
                    <font-awesome-icon :icon="['fas', 'angle-down']" class="mt-1 mr-2 is-pulled-right" />
                  </a>
                </li>
                <div class="content mb-0">
                  <ul>
                    <li v-if="getPermission.includes('families index')">
                      <NuxtLink to="/family"> <font-awesome-icon :icon="['fas', 'angle-right']" class="mt-1 mr-2" /> Families</NuxtLink>
                    </li>
                    <li v-if="getPermission.includes('family events index')">
                      <NuxtLink to="/familyevent"> <font-awesome-icon :icon="['fas', 'angle-right']" class="mt-1 mr-2" /> Family Events</NuxtLink>
                    </li>
                    <li v-if="getPermission.includes('family slugs index')">
                      <NuxtLink to="/familyslgs"> <font-awesome-icon :icon="['fas', 'angle-right']" class="mt-1 mr-2" /> Family Slugs</NuxtLink>
                    </li>
                  </ul>
                </div>
                <li class="collapsible" id="references" v-if="getPermission.includes('references menu')" @click="menuDropdown('references')">
                  <a href="#">
                    <font-awesome-icon :icon="['fas', 'thumbs-up']" class="mt-1 mr-2" />
                    References
                    <font-awesome-icon :icon="['fas', 'angle-down']" class="mt-1 mr-2 is-pulled-right" />
                  </a>
                </li>
                <div class="content mb-0">
                  <ul>
                    <li v-if="getPermission.includes('citations index')">
                      <NuxtLink to="/citation"> <font-awesome-icon :icon="['fas', 'angle-right']" class="mt-1 mr-2" /> Citations</NuxtLink>
                    </li>
                    <li v-if="getPermission.includes('notes index')">
                      <NuxtLink to="/note"> <font-awesome-icon :icon="['fas', 'angle-right']" class="mt-1 mr-2" /> Notes</NuxtLink>
                    </li>
                    <li v-if="getPermission.includes('places index')">
                      <NuxtLink to="/place"> <font-awesome-icon :icon="['fas', 'angle-right']" class="mt-1 mr-2" /> Places</NuxtLink>
                    </li>
                    <li v-if="getPermission.includes('authors index')">
                      <NuxtLink to="/author"> <font-awesome-icon :icon="['fas', 'angle-right']" class="mt-1 mr-2" /> Authors</NuxtLink>
                    </li>
                    <li v-if="getPermission.includes('publications index')">
                      <NuxtLink to="/publication"> <font-awesome-icon :icon="['fas', 'angle-right']" class="mt-1 mr-2" /> Publications</NuxtLink>
                    </li>
                  </ul>
                </div>
                <li class="collapsible" id="trees" v-if="getPermission.includes('trees menu')" @click="menuDropdown('trees')">
                  <a href="#">
                    <font-awesome-icon :icon="['fas', 'users']" class="mt-1 mr-2" />
                    Trees
                    <font-awesome-icon :icon="['fas', 'angle-down']" class="mt-1 mr-2 is-pulled-right" />
                  </a>
                </li>
                <div class="content mb-0">
                  <ul>
                    <li v-if="getPermission.includes('trees index')">
                      <NuxtLink to="/tree"> <font-awesome-icon :icon="['fas', 'angle-right']" class="mt-1 mr-2" /> Trees</NuxtLink>
                    </li>
                    <!-- <li v-if="getPermission.includes('trees show index')">
                        <NuxtLink to="/tree/show"> <font-awesome-icon :icon="['fas', 'angle-right']" class="mt-1 mr-2" /> Show</NuxtLink>
                    </li> -->
                    <li v-if="getPermission.includes('pedigree index')">
                      <NuxtLink to="/pedigree/show"> <font-awesome-icon :icon="['fas', 'angle-right']" class="mt-1 mr-2" /> Pedigree</NuxtLink>
                    </li>
                  </ul>
                </div>
                <li class="collapsible" id="forum" v-if="getPermission.includes('forum menu')" @click="menuDropdown('forum')">
                  <a href="#">
                    <font-awesome-icon :icon="['fas', 'question-circle']" class="mt-1 mr-2" />
                    Forum
                    <font-awesome-icon :icon="['fas', 'angle-down']" class="mt-1 mr-2 is-pulled-right" />
                  </a>
                </li>
                <div class="content mb-0">
                  <ul>
                    <li v-if="getPermission.includes('subjects index')">
                      <NuxtLink to="/forum"> <font-awesome-icon :icon="['fas', 'angle-right']" class="mt-1 mr-2" /> Subjects</NuxtLink>
                    </li>
                    <li v-if="getPermission.includes('categories index')">
                      <NuxtLink to="/forumcategory"> <font-awesome-icon :icon="['fas', 'angle-right']" class="mt-1 mr-2" /> Categories</NuxtLink>
                    </li>
                  </ul>
                </div>
                <li class="collapsible" id="gedcom" v-if="getPermission.includes('gedcom import menu')" @click="menuDropdown('gedcom')">
                  <a href="#">
                    <font-awesome-icon :icon="['fas', 'question-circle']" class="mt-1 mr-2" />
                    GEDCOM
                    <font-awesome-icon :icon="['fas', 'angle-down']" class="mt-1 mr-2 is-pulled-right" />
                  </a>
                </li>
                <div class="content mb-0">
                  <ul>
                  <li v-if="getPermission.includes('gedcom import menu')" @click="menu" class="simplemenu">
                  <NuxtLink to="/gedcom" >
                    <font-awesome-icon :icon="['fas', 'file-import']" class="mt-1 mr-2" />
                    GEDCOM Import
                  </NuxtLink>
                </li>
                <li v-if="getPermission.includes('gedcom import menu')" @click="menu" class="simplemenu">
                  <NuxtLink to="/gedcom-export" >
                    <font-awesome-icon :icon="['fas', 'file-import']" class="mt-1 mr-2" />
                    GEDCOM Export
                  </NuxtLink>
                </li>
                    </ul>
                </div>
                <li v-if="getPermission.includes('subscription menu')" @click="menu" class="simplemenu">
                  <NuxtLink to="/subscription" >
                    <font-awesome-icon :icon="['fas', 'rocket']" class="mt-1 mr-2" />
                    Subscription</NuxtLink>
                </li>
                <li class="collapsible" id="dna" v-if="getPermission.includes('dna upload menu')" @click="menuDropdown('dna')">
                  <a href="#">
                    <font-awesome-icon :icon="['fas', 'dna']" class="mt-1 mr-2" />
                    DNA
                    <font-awesome-icon :icon="['fas', 'angle-down']" class="mt-1 mr-2 is-pulled-right" />
                  </a>
                </li>
                <div class="content mb-0">
                  <ul>
                <li v-if="getPermission.includes('dna upload menu')" @click="menu" class="simplemenu">
                  <NuxtLink to="/dnaupload" >
                    <font-awesome-icon :icon="['fas', 'file-upload']" class="mt-1 mr-2" />
                    DNA Upload</NuxtLink>
                </li>
                <li v-if="getPermission.includes('dna matching menu')" @click="menu" class="simplemenu">
                  <NuxtLink to="/dnamatching" >
                    <font-awesome-icon :icon="['fas', 'dna']" class="mt-1 mr-2" />
                    DNA Matching</NuxtLink>
                </li>
                  </ul>
                </div>
                <li v-if="getPermission.includes('how to videos menu')" @click="menu" class="simplemenu">
                  <a href="#">
                    <font-awesome-icon :icon="['fas', 'video']" class="mt-1 mr-2" />
                    How to Videos</a>
                </li>
              </ul>
            </aside>
          </div>
        </div>
      </div>
      <div class="column is-10-desktop is-offset-2-desktop is-9-tablet is-offset-3-tablet is-12-mobile pb-0">
        <div class="p-1 wrapper">
          <Nuxt />
          <footer class="footer mt-5">
            Copyright &copy; Family Tree 365 Ltd,<br> Unit A, 82 James Carter Road, Mildenhall, Suffolk, England, IP28 7DE<br> Company
            number 12734769
          </footer>
        </div>
      </div>
    </div>
    <!-- :icons="icons" -->
    <beautiful-chat
      :participants="participants"
      :titleImageUrl="titleImageUrl"
      :onMessageWasSent="onMessageWasSent"
      :messageList="messageList"
      :newMessagesCount="newMessagesCount"
      :isOpen="isChatOpen"
      :close="closeChat"
      :open="openChat"
      :showEmoji="true"
      :showFile="true"
      :showEdition="true"
      :showDeletion="true"
      :showTypingIndicator="showTypingIndicator"
      :showLauncher="true"
      :showCloseButton="true"
      :colors="colors"
      :alwaysScrollToBottom="alwaysScrollToBottom"
      :messageStyling="messageStyling"
      @onType="handleOnType"
      @edit="editMessage" />
  </div>
</template>
<script>
import { mapGetters, mapActions } from "vuex";
import Vue from 'vue'
import Chat from 'vue-beautiful-chat'
import MessageDropdown from '~/components/chat/MessageDropdown'
Vue.use(Chat)
export default {
  middleware: "auth",
  components: {
    MessageDropdown
  },
  data() {
    return {
      isActive: false,
      currentRole: null,
      participants: [
        {
          id: 'support_ft',
          name: 'Support',
          imageUrl: 'https://a.slack-edge.com/66f9/img/avatars-teams/ava_0001-34.png'
        }
      ], // the list of all the participant of the conversation. `name` is the user name, `id` is used to establish the author of a message, `imageUrl` is supposed to be the user avatar.
      titleImageUrl: 'https://a.slack-edge.com/66f9/img/avatars-teams/ava_0001-34.png',
      messageList: [
        {type: 'text', author: `me`, data: {text: `Say yes!`}},
        {type: 'text', author: `user1`, data: {text: `No.`}}
      ], // the list of the messages to show, can be paginated and adjusted dynamically
      newMessagesCount: 0,
      isChatOpen: false, // to determine whether the chat window should be open or closed
      showTypingIndicator: '', // when set to a value matching the participant.id it shows the typing indicator for the specific user
      colors: {
        header: {
          bg: '#4e8cff',
          text: '#ffffff'
        },
        launcher: {
          bg: '#4e8cff'
        },
        messageList: {
          bg: '#ffffff'
        },
        sentMessage: {
          bg: '#4e8cff',
          text: '#ffffff'
        },
        receivedMessage: {
          bg: '#eaeaea',
          text: '#222222'
        },
        userInput: {
          bg: '#f4f7f9',
          text: '#565867'
        }
      }, // specifies the color scheme for the component
      alwaysScrollToBottom: false, // when set to true always scrolls the chat to the bottom when new events are in (new message, user starts typing...)
      messageStyling: true // enables *bold* /emph/ _underline_ and such (more info at github.com/mattezza/msgdown)
    }
  },
  computed: {
    ...mapGetters(['loggedInUser','getRole','getPermission'])
  },
  created() {
    this.loadPermission()
    this.loadRole()
    //this.collapsible();
  },
  mounted() {
    this.loadRole()
    this.loadPermission()
    //this.collapsible();
  },

  methods: {
    menuDropdown(id) {
      var element = document.getElementsByClassName("collapsible");
      var i;
      for (i = 0; i < element.length; i++) {
        element[i].classList.remove("active");
        var content = element[i].nextElementSibling;
        if(element[i].id != id) {
          if (content.style.maxHeight) {
            content.style.maxHeight = null;
          }
        }

      }
      var coll = document.getElementById(id)
      var content = coll.nextElementSibling;
      coll.classList.add("active");
      if (content.style.maxHeight) {
        content.style.maxHeight = null;
      }
      else {
        content.style.maxHeight = content.scrollHeight + "px";
      }
    },
    menu(el) {
      var element = document.getElementsByClassName("collapsible");
      var i;
      for (i = 0; i < element.length; i++) {
        element[i].classList.remove("active");
        var content = element[i].nextElementSibling;
        if (content.style.maxHeight) {
          content.style.maxHeight = null;
        }
      }
    },
    toggler() {
      this.isActive = !this.isActive;
    },
    ...mapActions([
      "loadRole",
      "loadPermission",
      "updateUnreadMsg"
    ]),
    async logout() {
      this.$auth.setToken(false)
      this.$auth.setRefreshToken(false)
      this.$axios.setHeader('Authorization', false)
      await this.$auth.logout();
    },
    collapsible() {
      console.log("hgh")
      var coll = document.getElementsByClassName('collapsible')
      var i;
      for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function () {
          this.classList.toggle("active");
          var content = this.nextElementSibling;
          if (content.style.maxHeight) {
            content.style.maxHeight = null;
          } else {
            content.style.maxHeight = content.scrollHeight + "px";
          }
        });
      }
    },
    sendMessage(text) {
      if (text.length > 0) {
        this.newMessagesCount = this.isChatOpen ? this.newMessagesCount : this.newMessagesCount + 1
        this.onMessageWasSent({author: 'support', type: 'text', data: {text}})
      }
    },
    onMessageWasSent(message) {
      // called when the user sends a message
      this.messageList = [...this.messageList, message]
    },
    openChat() {
      // called when the user clicks on the fab button to open the chat
      this.isChatOpen = true
      this.newMessagesCount = 0
    },
    closeChat() {
      // called when the user clicks on the botton to close the chat
      this.isChatOpen = false
    },
    handleScrollToTop() {
      // called when the user scrolls message list to top
      // leverage pagination for loading another page of messages
    },
    handleOnType() {
      console.log('Emit typing event')
    },
    editMessage(message) {
      const m = this.messageList.find(m => m.id === message.id);
      m.isEdited = true;
      m.data.text = message.data.text;
    }
  },

}
</script>

<style scoped>
@import '~/assets/css/bulma.css';
@import '~/assets/css/admin.css';
@import '~/assets/css/fontawesome.min.css';
</style>
