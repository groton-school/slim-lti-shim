<!--- BEGIN HEADER -->
# Changelog

All notable changes to this project will be documented in this file.
<!--- END HEADER -->

## [4.1.3](https://github.com/groton-school/slim-lti-shim/compare/v4.1.2...v4.1.3) (2025-09-26)

### Bug Fixes

* Lighter-weight spinner animation ([7eb1a9](https://github.com/groton-school/slim-lti-shim/commit/7eb1a9eca9d68129ce906f254860afb989f2c6a8))


---

## [4.1.2](https://github.com/groton-school/slim-lti-shim/compare/v4.1.1...v4.1.2) (2025-09-25)

### Bug Fixes

* Standardize on Bootstrap loading progress animation ([e3fc25](https://github.com/groton-school/slim-lti-shim/commit/e3fc257b20d965e7486d4c2cf80caf2aa79b91a8))


---

## [4.1.1](https://github.com/groton-school/slim-lti-shim/compare/v4.1.0...v4.1.1) (2025-09-19)

### Bug Fixes

* Normalize inner middleware definitions ([3196e3](https://github.com/groton-school/slim-lti-shim/commit/3196e38edb41da00795caa304f4d5b13932eaa0f))


---

## [4.1.0](https://github.com/groton-school/slim-lti-shim/compare/v4.0.1...v4.1.0) (2025-09-19)

### Features

* Inject inner middleware into RouteBuilder ([489a55](https://github.com/groton-school/slim-lti-shim/commit/489a55822d34b6f6495dae0e8dd82b537119c2fb))


---

## [4.0.1](https://github.com/groton-school/slim-lti-shim/compare/v4.0.0...v4.0.1) (2025-09-15)

### Bug Fixes

* Reconnect broken registration complete view ([f17b39](https://github.com/groton-school/slim-lti-shim/commit/f17b398ffd0281c01e29f6e3a9fbf84c792b7e5d))


---

## [4.0.0](https://github.com/groton-school/slim-lti-shim/compare/v3.0.4...v4.0.0) (2025-09-09)

### ⚠ BREAKING CHANGES

* Support constructor injection by making static members dynamic ([0c55c6](https://github.com/groton-school/slim-lti-shim/commit/0c55c647d0097aab886313870623f62250c46181))


---

## [3.0.4](https://github.com/groton-school/slim-lti-shim/compare/v3.0.3...v3.0.4) (2025-09-04)

### Bug Fixes

* Upgrade to dist version of dflydev/fig-cookies ([23254e](https://github.com/groton-school/slim-lti-shim/commit/23254e6bc5612fdb71e77133c83c0cc86c4616cb))


---

## [3.0.3](https://github.com/groton-school/slim-lti-shim/compare/v3.0.2...v3.0.3) (2025-08-18)

### Bug Fixes

* Restore launch view ([b775b9](https://github.com/groton-school/slim-lti-shim/commit/b775b90b3f710a894faea57b6f9a08d7c4894a33))


---

## [3.0.2](https://github.com/groton-school/slim-lti-shim/compare/v3.0.1...v3.0.2) (2025-08-18)

### Bug Fixes

* Emit only HTML on registration complete ([d2e7bf](https://github.com/groton-school/slim-lti-shim/commit/d2e7bf5026cdebad07bcb93dcff5597f070995f6))


---

## [3.0.1](https://github.com/groton-school/slim-lti-shim/compare/v3.0.0...v3.0.1) (2025-08-18)

### Bug Fixes

* Fully initialize RegistrationCompleteAction ([4ee951](https://github.com/groton-school/slim-lti-shim/commit/4ee951213b00a088d8be4e626f928150198eae3c))


---

## [3.0.0](https://github.com/groton-school/slim-lti-shim/compare/v2.3.0...v3.0.0) (2025-08-13)

### ⚠ BREAKING CHANGES

* Implement cookies with dflydev/fig-cookies throughout the dev stack ([0ee148](https://github.com/groton-school/slim-lti-shim/commit/0ee1486a825960d1ca7d692db74ead2e07c61efd))


---

## [2.3.0](https://github.com/groton-school/slim-lti-shim/compare/v2.2.0...v2.3.0) (2025-08-07)

### Features

* Inject dependencies with Dependencies::inject() ([c1ce04](https://github.com/groton-school/slim-lti-shim/commit/c1ce04a3af674767ceb85b2029d282308158ca42))


---

## [2.2.0](https://github.com/groton-school/slim-lti-shim/compare/v2.1.0...v2.2.0) (2025-08-07)

### Features

* Add RouteBuilder to define LTI routes ([5c3808](https://github.com/groton-school/slim-lti-shim/commit/5c38084c47fc7eda30c4469a086fdf808b66d0a1))
* Add support for php-di@7.x ([721301](https://github.com/groton-school/slim-lti-shim/commit/72130171e3909de5915465bf8938cc290b6024ff))


---

## [2.1.0](https://github.com/groton-school/slim-lti-shim/compare/v2.0.3...v2.1.0) (2025-08-06)

### Features

* Add Domain\User ([b015c0](https://github.com/groton-school/slim-lti-shim/commit/b015c048f919c7381bb0d4b9a6d40cd57b892fc8))

### Bug Fixes

* Make __invoke() methods public ([0218e4](https://github.com/groton-school/slim-lti-shim/commit/0218e41c155c56c7ddf67694cb9fe37415a1e35f))
* Use parent $views ([915de3](https://github.com/groton-school/slim-lti-shim/commit/915de348765634a08efe9ccef947a5dd10992c82))


---

## [2.0.3](https://github.com/groton-school/lti.slim-lti-shim/compare/v2.0.2...v2.0.3) (2025-07-26)

- Bump dependencies

---

## [2.0.2](https://github.com/groton-school/lti.slim-lti-shim/compare/v2.0.1...v2.0.2) (2025-07-05)

### Bug Fixes

- Correct two more AbstractActions ([1f99d7](https://github.com/groton-school/lti.slim-lti-shim/commit/1f99d7caefd7e0acb1d358b0af94e0390523fcf7))

---

## [2.0.1](https://github.com/groton-school/lti.slim-lti-shim/compare/v2.0.0...v2.0.1) (2025-07-05)

### Bug Fixes

- Correct AbstractAction ([0f14ad](https://github.com/groton-school/lti.slim-lti-shim/commit/0f14adbba716c88ccc5970fcf681cb68a1569844))

---

## [2.0.0](https://github.com/groton-school/lti.slim-lti-shim/compare/v1.2.0...v2.0.0) (2025-07-05)

### ⚠ BREAKING CHANGES

- Trait-ify slim-lti-shim views, remove AbstractAction ([1e196f](https://github.com/groton-school/lti.slim-lti-shim/commit/1e196f7c2bceb343e93ad34ea734e4d2a2e54790))

### Features

- Visual loaders ([3060cd](https://github.com/groton-school/lti.slim-lti-shim/commit/3060cd3bc2662ffe9430b09f1d104c1248b4ff2f))

---

# Changelog

All notable changes to this project will be documented in this file.

## [1.2.0](https://github.com/groton-school/lti.slim-lti-shim/compare/v1.1.0...v1.2.0) (2025-07-03)

### Features

- use postMessage state validation when cookies unavailable ([66fb588](https://github.com/groton-school/lti.slim-lti-shim/commit/66fb5884160e209208349cf417c3d13b78864dd2))
- implement CHIPS partitioned cookies ([c770967](https://github.com/groton-school/lti.slim-lti-shim/commit/c770967e389f5538bea2c018ffecdf74cf2f86a5))

## [1.1.0](https://github.com/groton-school/lti.slim-lti-shim/compare/v1.0.1...v1.1.0) (2025-05-18)

### Features

- accept JsonSerializable tool configuration as well as associative array ([a700001](https://github.com/groton-school/lti.slim-lti-shim/commit/a7000011e05d8c155048f1e1fa80a558ee63a195))

### Bug Fixes

- more specific error message on RegistrationConfigurePassthruAction::action() ([e0b0370](https://github.com/groton-school/lti.slim-lti-shim/commit/e0b0370e9311eb42a069ce0291bcf8e9eace0ba6))

## [1.0.1](https://github.com/groton-school/lti.slim-lti-shim/compare/v1.0.0...v1.0.1) (2025-04-19)

### Bug Fixes

- stabilize dependencies ([2b447df](https://github.com/groton-school/lti.slim-lti-shim/commit/2b447dfedd8428aa6ca5efa915c9ab3cf8790321))

## [1.0.0](https://github.com/groton-school/lti.slim-lti-shim/compare/1751c27a7f2e0d515a0c3965ef24024eeab0a1dd...v1.0.0) (2025-04-19)
