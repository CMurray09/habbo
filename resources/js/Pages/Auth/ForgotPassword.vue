<template>
    <Head title="Forgot Password" />

    <jet-authentication-card>
        <div class="mb-4 text-sm text-gray-600">
            Forgot your password? No problem. Fill out your username, habbo name, and new password. Remember to copy and paste the code in your Habbo's motto!
        </div>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <jet-validation-errors class="mb-4" />

        <form @submit.prevent="updatePassword" method="post">
            <!-- Username -->
            <div>
                <jet-label for="username" value="Username" />
                <jet-input id="username" type="text" class="mt-1 block w-full" v-model="form.username" required autofocus autocomplete="username" />
            </div>
            <jet-input-error :message="form.errors.username" class="mt-2" />

            <!-- Habbo name -->
            <div class="mt-4">
                <jet-label for="habboname" value="Habbo Name" />
                <jet-input id="habboname" type="text" class="mt-1 block w-full" v-model="form.habboname" required />
                <jet-input-error :message="form.errors.habboname" class="mt-2" />
                <jet-input-error :message="form.errors.motto" class="mt-2" />
            </div>

            <!-- Habbo motto -->
            <div class="mt-4">
                <jet-label for="habbocode" value="Habbo Motto Code" />
                <div class="grid grid-cols-3 gap-4">
                    <jet-input id="habbocode" class="col-span-2" type="text" readonly value="HabboDome-Reset"/>
                    <jet-button id="copycode" type="button" class="col-span-1" v-on:click="copyToClipboard()">Copy</jet-button>
                </div>
            </div>

            <div class="mt-4">
                <jet-label for="password" value="Password" />
                <jet-input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <jet-label for="password_confirmation" value="Confirm Password" />
                <jet-input id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Update Password
                </jet-button>
            </div>
        </form>
    </jet-authentication-card>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Head } from '@inertiajs/inertia-vue3';
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'
    import JetInputError from "@/Jetstream/InputError";

    export default defineComponent({
        components: {
            Head,
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetLabel,
            JetValidationErrors,
            JetInputError
        },

        props: {
            status: String
        },

        data() {
            return {
                form: this.$inertia.form({
                    username: '',
                    habboname: '',
                    password: '',
                    password_confirmation: '',
                })
            }
        },

        methods: {
            copyToClipboard() {
                const copyText = document.getElementById("habbocode");
                copyText.select();
                document.execCommand('copy');
                window.getSelection().removeAllRanges();
            },
            updatePassword() {
                this.form.post(route('password-reset'), {
                    errorBag: 'updatePassword',
                    preserveScroll: true,
                    onSuccess: () => this.form.reset(),
                    onError: () => {
                        if (this.form.errors.password) {
                            this.form.reset('password', 'password_confirmation')
                            this.$refs.password.focus()
                        }

                        if (this.form.errors.current_password) {
                            this.form.reset('current_password')
                            this.$refs.current_password.focus()
                        }
                    }
                })
            },
        }
    })
</script>
