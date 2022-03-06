<template>
    <Head title="Register" />

    <jet-authentication-card>
        <template #logo>
            <jet-authentication-card-logo />
        </template>

        <jet-validation-errors class="mb-4" />

        <form @submit.prevent="submit">
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
                    <jet-input id="habbocode" class="col-span-2" type="text" readonly value="HabboDome-Register"/>
                    <jet-button id="copycode" type="button" class="col-span-1" v-on:click="copyToClipboard()">Copy</jet-button>
                </div>
            </div>

            <div class="mt-4">
                <jet-label for="password" value="Password" />
                <jet-input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="new-password" />
            </div>
            <jet-input-error :message="form.errors.password" class="mt-2" />

            <div class="mt-4">
                <jet-label for="password_confirmation" value="Confirm Password" />
                <jet-input id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" required autocomplete="new-password" />
            </div>
            <jet-input-error :message="form.errors.password_confirmation" class="mt-2" />

            <div class="mt-4" v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature">
                <jet-label for="terms">
                    <div class="flex items-center">
                        <jet-checkbox name="terms" id="terms" v-model:checked="form.terms" />

                        <div class="ml-2">
                            I agree to the <a target="_blank" :href="route('terms.show')" class="underline text-sm text-gray-600 hover:text-gray-900">Terms of Service</a> and <a target="_blank" :href="route('policy.show')" class="underline text-sm text-gray-600 hover:text-gray-900">Privacy Policy</a>
                        </div>
                    </div>
                </jet-label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900">
                    Already registered?
                </Link>

                <jet-button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Register
                </jet-button>
            </div>
        </form>
    </jet-authentication-card>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetCheckbox from '@/Jetstream/Checkbox.vue'
    import JetInputError from '@/Jetstream/InputError'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
            Head,
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetCheckbox,
            JetInputError,
            JetLabel,
            JetValidationErrors,
            Link,
        },

        data() {
            return {
                form: this.$inertia.form({
                    username: '',
                    habboname: '',
                    password: '',
                    password_confirmation: '',
                    terms: false,
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
            submit() {
                this.form.post(this.route('register'), {
                    onFinish: () => this.form.reset('password', 'password_confirmation'),
                })
            }
        }
    })
</script>
