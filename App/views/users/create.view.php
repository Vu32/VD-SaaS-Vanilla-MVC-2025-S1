<?php
/**
 * Create View Page
 *
 * DESCRIPTION OF THE PURPOSE AND USE OF THE CODE
 * MAY BE MORE THAN ONE LINE LONG
 * KEEP LINE LENGTH TO NO MORE THAN 96 CHARACTERS
 *
 * Filename:        create.view.php
 * Location:        App/views/users
 * Project:         VD-SaaS-Vanilla-MVC-2025-S1
 * Date Created:    29/03/2025
 *
 * Author:          Vu Do J241918@tafe.wa.edu.au
 *
 */
loadPartial('header');
loadPartial('navigation');
?>

    <main class="flex justify-center items-center mt-20">
        <section class="bg-white p-8 rounded-lg shadow-md w-1/2 md:w-500 mx-6">
            <h2 class="text-4xl text-left font-bold mb-4">Register</h2>

            <?= loadPartial('errors', [
                'errors' => $errors ?? []
            ]) ?>

            <form method="POST" action="/auth/register">

                <section class="mb-4">
                    <label for="Name" class="mt-4 pb-1">Name:</label>
                    <input type="text" id="Name"
                           name="name" placeholder="Full Name"
                           class="w-full px-4 py-2 border border-b-zinc-300 rounded focus:outline-none"
                           value="<?= $user['name'] ?? '' ?>"/>
                </section>
                <section class="mb-4">
                    <label for="Email" class="mt-4 pb-1">Email:</label>
                    <input type="email" id="Email"
                           name="email" placeholder="Email Address"
                           class="w-full px-4 py-2 border border-b-zinc-300 rounded focus:outline-none"
                           value="<?= $user['email'] ?? '' ?>"/>
                </section>
                <section class="mb-4">
                    <label for="City" class="mt-4 pb-1">City:</label>
                    <input type="text" id="City"
                           name="city" placeholder="City"
                           class="w-full px-4 py-2 border border-b-zinc-300 rounded focus:outline-none"
                           value="<?= $user['city'] ?? '' ?>"/>
                </section>
                <section class="mb-4">
                    <label for="State" class="mt-4 pb-1">State:</label>
                    <input type="text" id="State"
                           name="state" placeholder="State"
                           class="w-full px-4 py-2 border border-b-zinc-300 rounded focus:outline-none"
                           value="<?= $user['state'] ?? '' ?>"/>
                </section>
                <section class="mb-4">
                    <label for="Password" class="mt-4 pb-1">Password:</label>
                    <input type="password" id="Password"
                           name="password" placeholder="Password"
                           class="w-full px-4 py-2 border border-b-zinc-300 rounded focus:outline-none"/>
                </section>
                <section class="mb-4">
                    <label for="PasswordConfirmation" class="mt-4 pb-1">Confirm password:</label>
                    <input type="password" id="PasswordConfirmation"
                           name="password_confirmation" placeholder="Confirm Password"
                           class="w-full px-4 py-2 border border-b-zinc-300 rounded focus:outline-none"/>
                </section>
                <section class="mb-4">
                    <button type="submit"
                            class="w-full bg-sky-500 hover:bg-sky-600 text-white px-4 py-2 rounded focus:outline-none
               transition ease-in-out duration-500">
                        Register
                    </button>
                </section>
                <section class="mb-4">
                    <p class="mt-8 text-zinc-700">
                        Already have an account?
                        <a class="bg-sky-900 hover:bg-sky-600 text-white px-1 pb-1 rounded
              transition ease-in-out duration-500" href="/auth/login">Login</a>
                    </p></section>

            </form>
        </section>

    </main>

<?php
loadPartial('footer');