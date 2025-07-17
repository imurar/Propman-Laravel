# 物件担当者割り当て管理アプリ

## 概要

-   **Laravel Sail（Docker）** を使ったローカル開発環境構築
-   **PostgreSQL** を利用した堅牢なデータ管理
-   **Blade + Vue.js** によるシンプル＆動的 UI
-   **OpenStreetMap + Leaflet.js** で物件の地図表示を無料で実現

---

## 主な機能

-   物件の登録・編集・一覧・詳細表示
-   担当者の登録・編集・一覧表示
-   物件と担当者の割り当て・解除（多対多リレーション）
-   物件詳細画面での地図表示（OpenStreetMap ＋ Leaflet.js）

---

## 開発環境構築手順

### 1. プロジェクト作成（Sail + PostgreSQL）

```bash
curl -s "https://laravel.build/property-manager?with=pgsql" | bash
cd property-manager
```

### 2. Docker 環境起動

```bash
./vendor/bin/sail up -d
```

### 3. マイグレーション実行

```bash
./vendor/bin/sail artisan migrate
```

### 4. Vue.js & Leaflet.js 導入

```bash
./vendor/bin/sail npm install vue@^3.0 @vitejs/plugin-vue leaflet
```

#### Vite 設定例（vite.config.js）

```js
import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
        vue(),
    ],
});
```

#### resources/js/app.js の例

```js
import "./bootstrap";
import { createApp } from "vue";
import PropertyMap from "./components/PropertyMap.vue";
import "leaflet/dist/leaflet.css";

const app = createApp({});
app.component("property-map", PropertyMap);
app.mount("#vue-property-map");
```

---

## データベース設計（概要）

### properties テーブル

| カラム     | 型         | 説明   |
| ---------- | ---------- | ------ |
| id         | bigint     | PK     |
| name       | string     | 物件名 |
| address    | string     | 住所   |
| price      | decimal    | 価格   |
| status     | string     | 状態   |
| latitude   | decimal    | 緯度   |
| longitude  | decimal    | 経度   |
| notes      | text       | 備考   |
| timestamps | timestamps |        |

### agents テーブル

| カラム     | 型         | 説明     |
| ---------- | ---------- | -------- |
| id         | bigint     | PK       |
| name       | string     | 担当者名 |
| email      | string     | メール   |
| phone      | string     | 電話番号 |
| timestamps | timestamps |          |

### property_agent テーブル（中間）

| カラム      | 型         | 説明         |
| ----------- | ---------- | ------------ |
| id          | bigint     | PK           |
| property_id | FK         | 物件 ID      |
| agent_id    | FK         | 担当者 ID    |
| assigned_at | timestamp  | 割り当て日時 |
| timestamps  | timestamps |              |

---

## 地図機能（OpenStreetMap + Leaflet.js）

-   **API キー不要・無料で商用利用 OK**
-   Vue コンポーネントで Leaflet.js を使い物件位置を地図表示

```vue
<template>
    <div id="map" style="height:400px;"></div>
</template>

<script setup>
import { onMounted } from "vue";
import L from "leaflet";

const props = defineProps({
    lat: Number,
    lng: Number,
});

onMounted(() => {
    const map = L.map("map").setView([props.lat, props.lng], 15);
    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution: "&copy; OpenStreetMap contributors",
    }).addTo(map);
    L.marker([props.lat, props.lng]).addTo(map);
});
</script>
```

---

## アピールポイント

-   Docker/Laravel Sail によるモダンな環境構築・運用力
-   業務アプリ設計（多対多リレーション・地図連携・動的 UI）
-   無料マップ API（OpenStreetMap ＋ Leaflet.js）の活用
-   将来の API 拡張や他システム連携も視野に入れた設計

---

## 今後の実装予定

-   コントローラ・ルーティング・Blade テンプレート作成
-   担当者割り当て/解除機能の UI/UX 強化
-   テストデータ投入・UI 仕上げ
-   認証や権限管理機能の追加（必要に応じて）

---
