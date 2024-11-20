<x-guest-layout>
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="display-5 fw-bold">Welcome</h1>
            <p class="lead m-0">
                Sign in to your Smarty account
            </p>
        </div>

        <div class="col-md-9 col-lg-6 mx-auto">

            <!-- form -->
            <form novalidate action="{{ route('login') }}" method="POST" class="bs-validate p-4 p-md-5 card rounded-xl"
                data-error-scroll-up="true">
                @csrf

                <x-text-input type="text" name="username" label="ชื่อผู้ใข้งาน/หมายเลขโทรศัพท์" required=true />
                <x-text-input type="password" name="password" label="รหัสผ่าน" required=true />
                <x-input-error :messages="$errors->get('username')" class="mt-2" />
                <div class="row">
                    <div class="col-12 col-md-6 mt-4">
                        <button type="submit" class="btn btn-primary w-100 fw-medium">
                            เข้าสู่ระบบ
                        </button>
                    </div>

                </div>
                <x-auth-session-status class="mb-4" :status="session('status')" />

            </form>
        </div>
    </div>
</x-guest-layout>