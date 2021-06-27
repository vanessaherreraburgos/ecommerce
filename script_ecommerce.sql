--
-- PostgreSQL database dump
--

-- Dumped from database version 13.0
-- Dumped by pg_dump version 13.0

-- Started on 2021-06-27 09:09:26

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 3029 (class 1262 OID 40979)
-- Name: ecommerce; Type: DATABASE; Schema: -; Owner: vanessa
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 206 (class 1259 OID 41054)
-- Name: sec_detalle_venta; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.sec_detalle_venta
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 99999
    CACHE 1;


ALTER TABLE public.sec_detalle_venta OWNER TO postgres;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 207 (class 1259 OID 41056)
-- Name: detalle_venta; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.detalle_venta (
    id integer DEFAULT nextval('public.sec_detalle_venta'::regclass) NOT NULL,
    id_venta integer NOT NULL,
    id_producto integer NOT NULL,
    precio_venta numeric NOT NULL,
    created_at timestamp without time zone
);


ALTER TABLE public.detalle_venta OWNER TO postgres;

--
-- TOC entry 202 (class 1259 OID 40993)
-- Name: producto; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.producto (
    id integer NOT NULL,
    descripcion character varying(150) NOT NULL,
    precio numeric NOT NULL,
    foto character varying(50),
    user_created character varying(50),
    created_at timestamp without time zone
);


ALTER TABLE public.producto OWNER TO postgres;

--
-- TOC entry 201 (class 1259 OID 40988)
-- Name: rol; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.rol (
    codigo integer NOT NULL,
    nombre character varying(50)
);


ALTER TABLE public.rol OWNER TO postgres;

--
-- TOC entry 203 (class 1259 OID 41022)
-- Name: sec_productos; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.sec_productos
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.sec_productos OWNER TO postgres;

--
-- TOC entry 204 (class 1259 OID 41040)
-- Name: sec_venta; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.sec_venta
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 99999
    CACHE 1;


ALTER TABLE public.sec_venta OWNER TO postgres;

--
-- TOC entry 200 (class 1259 OID 40980)
-- Name: usuario; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.usuario (
    login character varying(255) NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    cod_rol integer,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    identificacion character varying(50),
    apellido character varying(255),
    direccion_envio character varying(255),
    telefono character varying(50)
);


ALTER TABLE public.usuario OWNER TO postgres;

--
-- TOC entry 205 (class 1259 OID 41042)
-- Name: venta; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.venta (
    id integer DEFAULT nextval('public.sec_venta'::regclass) NOT NULL,
    id_user character varying(25),
    nombre_invitado character varying(100),
    apellido_invitado character varying(100),
    identificacion_invitado character varying(100),
    direccion_invitado character varying(250),
    telefono_invitado character varying(100),
    fecha_venta date,
    total_venta numeric,
    tarjeta_credito character varying(50),
    anno_expiracion character varying(10),
    cvv character varying(10),
    identificacion_titular character varying(50),
    nombre_titular character varying(100),
    mes_expiracion character varying(50),
    created_at timestamp without time zone
);


ALTER TABLE public.venta OWNER TO postgres;

--
-- TOC entry 3023 (class 0 OID 41056)
-- Dependencies: 207
-- Data for Name: detalle_venta; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.detalle_venta (id, id_venta, id_producto, precio_venta, created_at) VALUES (1, 10, 3, 145000, '2021-06-27 11:24:24');
INSERT INTO public.detalle_venta (id, id_venta, id_producto, precio_venta, created_at) VALUES (2, 10, 4, 975000, '2021-06-27 11:24:24');
INSERT INTO public.detalle_venta (id, id_venta, id_producto, precio_venta, created_at) VALUES (3, 11, 1, 1454320, '2021-06-27 11:33:03');
INSERT INTO public.detalle_venta (id, id_venta, id_producto, precio_venta, created_at) VALUES (4, 11, 3, 145000, '2021-06-27 11:33:03');
INSERT INTO public.detalle_venta (id, id_venta, id_producto, precio_venta, created_at) VALUES (5, 12, 1, 1454320, '2021-06-27 11:33:58');
INSERT INTO public.detalle_venta (id, id_venta, id_producto, precio_venta, created_at) VALUES (6, 13, 1, 1454320, '2021-06-27 11:38:45');
INSERT INTO public.detalle_venta (id, id_venta, id_producto, precio_venta, created_at) VALUES (7, 13, 4, 975000, '2021-06-27 11:38:45');
INSERT INTO public.detalle_venta (id, id_venta, id_producto, precio_venta, created_at) VALUES (8, 14, 1, 1454320, '2021-06-27 13:44:03');
INSERT INTO public.detalle_venta (id, id_venta, id_producto, precio_venta, created_at) VALUES (9, 14, 3, 145000, '2021-06-27 13:44:03');


--
-- TOC entry 3018 (class 0 OID 40993)
-- Dependencies: 202
-- Data for Name: producto; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.producto (id, descripcion, precio, foto, user_created, created_at) VALUES (1, 'Tv Samsung  14 ', 1454320, 'tv.png', 'vanessa', '2021-06-26 18:55:00');
INSERT INTO public.producto (id, descripcion, precio, foto, user_created, created_at) VALUES (2, 'Computador 12 Gb RAM ', 2300765, 'computador.png', 'vanessa', '2021-06-26 18:55:00');
INSERT INTO public.producto (id, descripcion, precio, foto, user_created, created_at) VALUES (3, 'Audifonos con auriculares Hp', 145000, 'audifonos.png', 'vanessa', '2021-06-26 18:55:00');
INSERT INTO public.producto (id, descripcion, precio, foto, user_created, created_at) VALUES (4, 'Celular Sony 7', 975000, 'celular.png', 'vanessa', '2021-06-26 18:55:00');


--
-- TOC entry 3017 (class 0 OID 40988)
-- Dependencies: 201
-- Data for Name: rol; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.rol (codigo, nombre) VALUES (1, 'Administrador');
INSERT INTO public.rol (codigo, nombre) VALUES (2, 'Vendedor');
INSERT INTO public.rol (codigo, nombre) VALUES (3, 'Operador de Cuentas');
INSERT INTO public.rol (codigo, nombre) VALUES (4, 'Guia');
INSERT INTO public.rol (codigo, nombre) VALUES (5, 'Chofer');


--
-- TOC entry 3016 (class 0 OID 40980)
-- Dependencies: 200
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.usuario (login, name, email, password, remember_token, cod_rol, created_at, updated_at, identificacion, apellido, direccion_envio, telefono) VALUES ('adrian.arroyave', 'Adrian Felipe Arroyave', 'adrianfelipearroyave@gmail.com', '$10$t4qxkqKSC.Xk2tprmr7.uuINYhkA0DqEZRSDRuGfy/69.ly7OLnuq', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.usuario (login, name, email, password, remember_token, cod_rol, created_at, updated_at, identificacion, apellido, direccion_envio, telefono) VALUES ('vanessa.herrera', 'Vanessa', 'herreravanessahb@gmail.com', '$2y$10$POAMpp2nuvq8O0H4C/HPreTKPKzlwmidEqXi2lQlLFtv7e4.e0Rs2', 'bKsjsTvdZcE5J6dCTYNHBxzLbt81XYWlaD5QAMzGbEHEQjuTsMvs8Zvm6Csy', 1, NULL, NULL, NULL, 'Herrera', 'Cra 23 # 12-54', '3197809792');
INSERT INTO public.usuario (login, name, email, password, remember_token, cod_rol, created_at, updated_at, identificacion, apellido, direccion_envio, telefono) VALUES ('herreravanessahb@gmail.com', 'Hector', 'herreravanessahb@gmail.com', '$2y$10$6rSWB..TtaL.thBnHISXLOsI4Ayr6n2uRUYk82z0N/0gElJktehBq', NULL, NULL, '2021-06-27 10:19:41', '2021-06-27 10:19:41', '3536645', 'Saavedra', 'cra 34556', '3197809792');
INSERT INTO public.usuario (login, name, email, password, remember_token, cod_rol, created_at, updated_at, identificacion, apellido, direccion_envio, telefono) VALUES ('herreravanessahb675433@gmail.com', 'vane ', 'herreravanessahb675433@gmail.com', '$2y$10$zI.M7jF4I6BCJzQ3eBUm8uS4ZlNcJwu5.po0W/a/AR3kIV.J7.zW.', '2J8jg5sA55780nDzDDzwE32EmF19gqEqmY6wGBRad7KZY3EsiYO3P7txHh3J', NULL, '2021-06-27 10:59:44', '2021-06-27 10:59:44', '4565765354', 'herrer', '4565765354', '3197809792');
INSERT INTO public.usuario (login, name, email, password, remember_token, cod_rol, created_at, updated_at, identificacion, apellido, direccion_envio, telefono) VALUES ('franklinsh@gmail.com', 'Franklin', 'franklinsh@gmail.com', '$2y$10$S85JON9PgQed1tJTfUPUYu4PHsA2Ns7a.Tfp4jx.F4MjrXqkDkwnC', 'VvyxUDcm1lQzcSkJr8ew5SkpMjtU2kLDfMtc1tqRCcKaRKc1ZUId3XUnIZab', NULL, '2021-06-27 11:04:31', '2021-06-27 11:04:31', '56543243', 'saavedra', '56543243', '34567674456');
INSERT INTO public.usuario (login, name, email, password, remember_token, cod_rol, created_at, updated_at, identificacion, apellido, direccion_envio, telefono) VALUES ('adrianav@gmail.com', 'Adriana', 'adrianav@gmail.com', '$2y$10$JuSFG/BIgtQ/Dxwlmw6qt.m2ufJKPQb1ujnWd3d0QKPFtN6cpFWy.', 'Zg26RSPEK1B6Y10LvRuLtYibchm10UMmPonr1zY848i2KLmU5dJR974GrjQT', NULL, '2021-06-27 11:40:05', '2021-06-27 11:40:05', 'q345657', 'vargas', 'q345657', '234565');
INSERT INTO public.usuario (login, name, email, password, remember_token, cod_rol, created_at, updated_at, identificacion, apellido, direccion_envio, telefono) VALUES ('hector233@gmail.com', 'hector', 'hector233@gmail.com', '$2y$10$FFThLMBC1REMEU.u27RpdO0OmrfRJbKw2bZnWJGEV/.PNx2bQzpv6', 'YwQLz0Dw6z1HQI4v3Cf4qa5r0Wi2LwhcAxj3cKqwgk9hZMRq9DCVdR4XNmKw', NULL, '2021-06-27 11:47:30', '2021-06-27 11:47:30', '23454', 'herrera', '12425345', '24356578');


--
-- TOC entry 3021 (class 0 OID 41042)
-- Dependencies: 205
-- Data for Name: venta; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.venta (id, id_user, nombre_invitado, apellido_invitado, identificacion_invitado, direccion_invitado, telefono_invitado, fecha_venta, total_venta, tarjeta_credito, anno_expiracion, cvv, identificacion_titular, nombre_titular, mes_expiracion, created_at) VALUES (1, 'vanessa.herrera', NULL, NULL, NULL, NULL, NULL, '2021-06-27', NULL, '346657466547656', NULL, '4565', '34567456', 'thrthtrh', '08', NULL);
INSERT INTO public.venta (id, id_user, nombre_invitado, apellido_invitado, identificacion_invitado, direccion_invitado, telefono_invitado, fecha_venta, total_venta, tarjeta_credito, anno_expiracion, cvv, identificacion_titular, nombre_titular, mes_expiracion, created_at) VALUES (2, 'vanessa.herrera', NULL, NULL, NULL, NULL, NULL, '2021-06-27', NULL, '23536475867', NULL, '2345', '2345657', 'tyrthrthrth', '34', '2021-06-27 09:40:03');
INSERT INTO public.venta (id, id_user, nombre_invitado, apellido_invitado, identificacion_invitado, direccion_invitado, telefono_invitado, fecha_venta, total_venta, tarjeta_credito, anno_expiracion, cvv, identificacion_titular, nombre_titular, mes_expiracion, created_at) VALUES (3, NULL, 'Carolina inv', ' Burgos prueba', '7777777', 'cra invitado', '32342423423', '2021-06-27', NULL, '23456543554', NULL, '3454', '34543544565', 'segrgergerg', '23', '2021-06-27 09:50:00');
INSERT INTO public.venta (id, id_user, nombre_invitado, apellido_invitado, identificacion_invitado, direccion_invitado, telefono_invitado, fecha_venta, total_venta, tarjeta_credito, anno_expiracion, cvv, identificacion_titular, nombre_titular, mes_expiracion, created_at) VALUES (4, NULL, '436576678', '2344rdgrg', '3245465', 'esfgrg', '32454356', '2021-06-27', NULL, '32456766576', NULL, '3456', '3456746576', 'rdhthrthtr', '34', '2021-06-27 09:52:52');
INSERT INTO public.venta (id, id_user, nombre_invitado, apellido_invitado, identificacion_invitado, direccion_invitado, telefono_invitado, fecha_venta, total_venta, tarjeta_credito, anno_expiracion, cvv, identificacion_titular, nombre_titular, mes_expiracion, created_at) VALUES (5, 'vanessa.herrera', NULL, NULL, NULL, NULL, NULL, '2021-06-27', NULL, '34656673465676', NULL, '3456', '3456787', 'retrhrhrtjrj', '34', '2021-06-27 09:53:46');
INSERT INTO public.venta (id, id_user, nombre_invitado, apellido_invitado, identificacion_invitado, direccion_invitado, telefono_invitado, fecha_venta, total_venta, tarjeta_credito, anno_expiracion, cvv, identificacion_titular, nombre_titular, mes_expiracion, created_at) VALUES (6, 'franklinsh@gmail.com', NULL, NULL, NULL, NULL, NULL, '2021-06-27', NULL, '23456789', NULL, '4567', '3456789', 'dsfghgjl', '34', '2021-06-27 11:05:07');
INSERT INTO public.venta (id, id_user, nombre_invitado, apellido_invitado, identificacion_invitado, direccion_invitado, telefono_invitado, fecha_venta, total_venta, tarjeta_credito, anno_expiracion, cvv, identificacion_titular, nombre_titular, mes_expiracion, created_at) VALUES (7, 'franklinsh@gmail.com', NULL, NULL, NULL, NULL, NULL, '2021-06-27', NULL, '6768788675646456', NULL, '1234', '23456789', 'dsfghjl', '67', '2021-06-27 11:07:37');
INSERT INTO public.venta (id, id_user, nombre_invitado, apellido_invitado, identificacion_invitado, direccion_invitado, telefono_invitado, fecha_venta, total_venta, tarjeta_credito, anno_expiracion, cvv, identificacion_titular, nombre_titular, mes_expiracion, created_at) VALUES (8, 'franklinsh@gmail.com', NULL, NULL, NULL, NULL, NULL, '2021-06-27', NULL, '24356789', NULL, '3456', '34567899', 'titular detalle', '34', '2021-06-27 11:21:50');
INSERT INTO public.venta (id, id_user, nombre_invitado, apellido_invitado, identificacion_invitado, direccion_invitado, telefono_invitado, fecha_venta, total_venta, tarjeta_credito, anno_expiracion, cvv, identificacion_titular, nombre_titular, mes_expiracion, created_at) VALUES (9, 'franklinsh@gmail.com', NULL, NULL, NULL, NULL, NULL, '2021-06-27', NULL, '235647586970890', NULL, '4356', '4356745676', 'detalle titulae', '34', '2021-06-27 11:22:22');
INSERT INTO public.venta (id, id_user, nombre_invitado, apellido_invitado, identificacion_invitado, direccion_invitado, telefono_invitado, fecha_venta, total_venta, tarjeta_credito, anno_expiracion, cvv, identificacion_titular, nombre_titular, mes_expiracion, created_at) VALUES (10, 'franklinsh@gmail.com', NULL, NULL, NULL, NULL, NULL, '2021-06-27', NULL, '24354768', NULL, '3456', '345567676', 'detalle 123', '34', '2021-06-27 11:24:24');
INSERT INTO public.venta (id, id_user, nombre_invitado, apellido_invitado, identificacion_invitado, direccion_invitado, telefono_invitado, fecha_venta, total_venta, tarjeta_credito, anno_expiracion, cvv, identificacion_titular, nombre_titular, mes_expiracion, created_at) VALUES (11, 'franklinsh@gmail.com', NULL, NULL, NULL, NULL, NULL, '2021-06-27', NULL, '2345687', NULL, '4563', '234566', 'fegrhrytrhtyt', '34', '2021-06-27 11:33:03');
INSERT INTO public.venta (id, id_user, nombre_invitado, apellido_invitado, identificacion_invitado, direccion_invitado, telefono_invitado, fecha_venta, total_venta, tarjeta_credito, anno_expiracion, cvv, identificacion_titular, nombre_titular, mes_expiracion, created_at) VALUES (12, 'franklinsh@gmail.com', NULL, NULL, NULL, NULL, NULL, '2021-06-27', NULL, '456768900', NULL, '4356', '435678', 'rthyjuyiuyuj', '23', '2021-06-27 11:33:58');
INSERT INTO public.venta (id, id_user, nombre_invitado, apellido_invitado, identificacion_invitado, direccion_invitado, telefono_invitado, fecha_venta, total_venta, tarjeta_credito, anno_expiracion, cvv, identificacion_titular, nombre_titular, mes_expiracion, created_at) VALUES (13, 'franklinsh@gmail.com', NULL, NULL, NULL, NULL, NULL, '2021-06-27', NULL, '254768799', NULL, '4356', '24356768', 'vavrfref', '23', '2021-06-27 11:38:45');
INSERT INTO public.venta (id, id_user, nombre_invitado, apellido_invitado, identificacion_invitado, direccion_invitado, telefono_invitado, fecha_venta, total_venta, tarjeta_credito, anno_expiracion, cvv, identificacion_titular, nombre_titular, mes_expiracion, created_at) VALUES (14, 'hector233@gmail.com', NULL, NULL, NULL, NULL, NULL, '2021-06-27', NULL, '234567', NULL, '2343', '2134565', 'efwrfwfe', '23', '2021-06-27 13:44:03');


--
-- TOC entry 3030 (class 0 OID 0)
-- Dependencies: 206
-- Name: sec_detalle_venta; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.sec_detalle_venta', 9, true);


--
-- TOC entry 3031 (class 0 OID 0)
-- Dependencies: 203
-- Name: sec_productos; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.sec_productos', 1, false);


--
-- TOC entry 3032 (class 0 OID 0)
-- Dependencies: 204
-- Name: sec_venta; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.sec_venta', 14, true);


--
-- TOC entry 2885 (class 2606 OID 41064)
-- Name: detalle_venta detalle_venta_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.detalle_venta
    ADD CONSTRAINT detalle_venta_pkey PRIMARY KEY (id);


--
-- TOC entry 2877 (class 2606 OID 41073)
-- Name: usuario pk__users__3213e83f0d3ba517; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT pk__users__3213e83f0d3ba517 PRIMARY KEY (login);


--
-- TOC entry 2879 (class 2606 OID 40992)
-- Name: rol pk_rol; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.rol
    ADD CONSTRAINT pk_rol PRIMARY KEY (codigo);


--
-- TOC entry 2881 (class 2606 OID 40997)
-- Name: producto producto_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.producto
    ADD CONSTRAINT producto_pkey PRIMARY KEY (id);


--
-- TOC entry 2883 (class 2606 OID 41050)
-- Name: venta venta_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.venta
    ADD CONSTRAINT venta_pkey PRIMARY KEY (id);


-- Completed on 2021-06-27 09:09:26

--
-- PostgreSQL database dump complete
--

